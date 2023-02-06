<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Console\Monolog\ReactConsoleHandler;
use OpenEuropa\EPoetry\Notification\Event\BaseNotificationEvent;
use OpenEuropa\EPoetry\Notification\Event as Notification;
use OpenEuropa\EPoetry\NotificationServerFactory;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;
use React\EventLoop\Loop;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\StreamOutput;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use React\Http\HttpServer;
use React\Http\Message\Response;
use Psr\Http\Message\ServerRequestInterface;
use React\Socket\SocketServer;

/**
 * Start a notification listener service.
 */
class StartNotificationListenerCommand extends Command implements EventSubscriberInterface
{
    protected static $defaultName = 'notification:start-listener';

    protected LoggerInterface $logger;

    protected Filesystem $fs;

    protected EventDispatcherInterface $eventDispatcher;

    protected NotificationServerFactory $notificationServer;

    protected bool $returnError = false;

    /**
     * Constructor.
     *
     * @param \OpenEuropa\EPoetry\NotificationServerFactory $notificationServer
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(NotificationServerFactory $notificationServer, LoggerInterface $logger, EventDispatcherInterface $eventDispatcher)
    {
        parent::__construct(null);
        $this->logger = $logger;
        $this->fs = new Filesystem();
        $this->notificationServer = $notificationServer;
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @inheritDoc
     */
    public static function getSubscribedEvents(): array
    {
        return [
            // Product notifications.
            Notification\Product\StatusChangeAcceptedEvent::NAME => 'logEvent',
            Notification\Product\StatusChangeCancelledEvent::NAME => 'logEvent',
            Notification\Product\StatusChangeClosedEvent::NAME => 'logEvent',
            Notification\Product\StatusChangeOngoingEvent::NAME => 'logEvent',
            Notification\Product\StatusChangeReadyToBeSentEvent::NAME => 'logEvent',
            Notification\Product\StatusChangeRequestedEvent::NAME => 'logEvent',
            Notification\Product\StatusChangeSentEvent::NAME => 'logEvent',
            Notification\Product\StatusChangeSuspendedEvent::NAME => 'logEvent',
            Notification\Product\DeliveryEvent::NAME => 'logEvent',
            // Request notifications.
            Notification\Request\StatusChangeAcceptedEvent::NAME => 'logEvent',
            Notification\Request\StatusChangeCancelledEvent::NAME => 'logEvent',
            Notification\Request\StatusChangeExecutedEvent::NAME => 'logEvent',
            Notification\Request\StatusChangeRejectedEvent::NAME => 'logEvent',
            Notification\Request\StatusChangeSuspendedEvent::NAME => 'logEvent',
        ];
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Event\BaseNotificationEvent $event
     *
     * @return void
     */
    public function logEvent(BaseNotificationEvent $event): void
    {
        $this->logger->info('Received event ' . $event::NAME);
        if ($this->returnError) {
            $this->logger->info('Returning error message.');
            $event->setErrorResponse('The notification was not handled successfully.');
            return;
        }
        $this->logger->info('Returning successful message.');
        $event->setSuccessResponse('The notification handled successfully.');
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setDescription('Run a notification service handler, listening for incoming messages at the given port.')
            ->addOption('port', 'p', InputOption::VALUE_REQUIRED, 'Port the service will listen onto.', 8088)
            ->addOption('save-to', null, InputOption::VALUE_REQUIRED, 'Path to a local folder in which to save incoming messages', '.sink/notifications')
            ->addOption('return-error', 'e', InputOption::VALUE_NONE, 'Set this flag to return an error.')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!$output instanceof StreamOutput) {
            $this->logger->alert('This command requires an output object of type \Symfony\Component\Console\Output\StreamOutput');
            return 1;
        }

        $folder = $input->getOption('save-to');
        $this->fs->mkdir(Path::normalize($folder), 0700);

        $loop = Loop::get();
        $this->logger->setHandlers([new ReactConsoleHandler($loop, $output)]);
        $this->eventDispatcher->addSubscriber($this);
        $this->returnError = $input->getOption('return-error');

        $handler = function (ServerRequestInterface $request) use ($folder) {
            switch ($request->getMethod()) {
                case 'GET':
                    $this->logger->info("Serving WSDL.");
                    return Response::xml($this->notificationServer->getWsdl());
                case 'POST':
                    $this->dumpRequestToFile($request, $folder);
                    $response = $this->notificationServer->handle($request);
                    $body = $response->getBody()->getContents();
                    $response->getBody()->rewind();
                    $this->logger->info('Response code: ' . $response->getStatusCode());
                    $this->logger->info('Response body: ' . $body);
                    return $response;
                default:
                    $this->logger->error("Cannot handle {$request->getMethod()} requests.");
                    return (new Response(Response::STATUS_BAD_REQUEST));
            }
        };

        $http = new HttpServer($loop, $handler);
        $http->on('error', function (\Exception $e) {
            $this->logger->error($e->getMessage());
        });
        $uri = '0.0.0.0:'.$input->getOption('port');
        $this->logger->notice("Listening on {$uri}");
        $http->listen(new SocketServer($uri));
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param string $folder
     *
     * @return void
     */
    private function dumpRequestToFile(ServerRequestInterface $request, string $folder): void
    {
        // Dump response in a log file.
        $content = $this->formatRequest($request);
        $filename = $this->getLogFilepath($folder);
        $this->logger->info("Saving request to $filename:\n\n" . $content);
        $this->fs->dumpFile($filename, $content);
    }

    /**
     * Get log filepath from current time.
     *
     * @param string $folder
     *
     * @return string
     */
    private function getLogFilepath(string $folder): string
    {
        $name = (new \DateTimeImmutable())->format('Y-m-d\THis.u');
        return $folder.DIRECTORY_SEPARATOR.$name.'.txt';
    }

    /**
     * Format request as a text file.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return string
     */
    private function formatRequest(RequestInterface $request): string
    {
        $method = $request->getMethod();
        $uri = (string) $request->getUri();
        $headers = $this->formatHeaders($request);
        $request->getBody()->rewind();
        $body = $request->getBody()->getContents();
        $request->getBody()->rewind();
        return "$method $uri\n\n$headers\n\n$body\n";
    }

    /**
     * Format headers as a list of strings.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return string
     */
    private function formatHeaders(RequestInterface $request): string
    {
        $headers = $request->getHeaders();
        if (empty($headers)) {
            return '';
        }

        array_walk($headers, function (&$values) {
            $values = implode('; ', $values);
        });

        $list = [];
        foreach ($headers as $header => $value) {
            $list[] = "$header: $value";
        }
        return implode(PHP_EOL, $list);
    }
}
