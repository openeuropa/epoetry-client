<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Console\Monolog\ReactConsoleHandler;
use Psr\Http\Message\RequestInterface;
use Psr\Log\LoggerInterface;
use React\EventLoop\Loop;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Output\StreamOutput;
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

    protected SerializerInterface $serializer;

    /**
     * Constructor.
     *
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     */
    public function __construct(LoggerInterface $logger, SerializerInterface $serializer)
    {
        parent::__construct(null);
        $this->logger = $logger;
        $this->serializer = $serializer;
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

        $fs = new Filesystem();
        $folder = $input->getOption('save-to');
        $fs->mkdir(Path::normalize($folder), 0700);

        $loop = Loop::get();
        $this->logger->setHandlers([new ReactConsoleHandler($loop, $output)]);
        $handler = function (ServerRequestInterface $request) use ($fs, $folder) {
            // Only handle POST requests.
            if ($request->getMethod() !== 'POST') {
                $this->logger->error("Cannot handle {$request->getMethod()} requests.");
                return Response::STATUS_BAD_GATEWAY;
            }

            // Dump response in a log file.
            $content = $this->formatResponse($request);
            $filename = $this->getLogFilepath($folder);
            $this->logger->info("Saving response to $filename:\n\n" . $content);
            $fs->dumpFile($filename, $content);

            return Response::plaintext('');
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
     * Format response as a text file.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return string
     */
    private function formatResponse(RequestInterface $request): string
    {
        $method = $request->getMethod();
        $uri = (string) $request->getUri();
        $headers = $this->formatHeaders($request);
        $body = $request->getBody()->getContents();
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
