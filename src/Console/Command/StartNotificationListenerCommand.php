<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Console\Monolog\ReactConsoleHandler;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse;
use OpenEuropa\EPoetry\NotificationServerFactory;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;
use React\EventLoop\Loop;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\ExtSoapEngine\ExtSoapOptionsResolverFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\StreamOutput;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use React\Http\HttpServer;
use React\Http\Message\Response;
use Psr\Http\Message\ServerRequestInterface;
use React\Socket\SocketServer;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Start a notification listener service.
 */
class StartNotificationListenerCommand extends Command
{
    protected static $defaultName = 'notification:start-listener';

    protected LoggerInterface $logger;

    protected Filesystem $fs;

    protected EventDispatcherInterface $eventDispatcher;

    protected NotificationServerFactory $notificationServer;

    /**
     * Constructor.
     *
     * @param \OpenEuropa\EPoetry\NotificationServerFactory $notificationServer
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(NotificationServerFactory $notificationServer, LoggerInterface $logger)
    {
        parent::__construct(null);
        $this->logger = $logger;
        $this->fs = new Filesystem();
        $this->notificationServer = $notificationServer;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setDescription('Run a notification service handler, listening for incoming messages at the given port.')
            ->addOption('port', 'p', InputOption::VALUE_REQUIRED, 'Port the service will listen onto.', 8088)
            ->addOption('save-to', null, InputOption::VALUE_REQUIRED, 'Path to a local folder in which to save incoming messages', '.sink/notifications')
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
        $handler = function (ServerRequestInterface $request) use ($folder) {
            // Only handle POST requests.
            if ($request->getMethod() !== 'POST') {
                $this->logger->error("Cannot handle {$request->getMethod()} requests.");
                return (new Response(Response::STATUS_BAD_REQUEST));
            }
            $this->dumpRequestToFile($request, $folder);
            return $this->notificationServer->handle($request);
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
