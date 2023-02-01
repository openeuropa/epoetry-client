<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;
use OpenEuropa\EPoetry\RequestClientFactory;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\SerializerInterface;

class EvaluateRequestCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected static $defaultName = 'request:evaluate';

    protected string $endpoint;

    protected LoggerInterface $logger;

    protected SerializerInterface $serializer;

    protected EventDispatcherInterface $eventDispatcher;

    protected AuthenticationInterface $authentication;

    /**
     * Constructor.
     *
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
     * @param \OpenEuropa\EPoetry\Authentication\AuthenticationInterface $authentication
     */
    public function __construct(string $endpoint, LoggerInterface $logger, SerializerInterface $serializer, EventDispatcherInterface $eventDispatcher, AuthenticationInterface $authentication)
    {
        parent::__construct(null);
        $this->endpoint = $endpoint;
        $this->logger = $logger;
        $this->serializer = $serializer;
        $this->eventDispatcher = $eventDispatcher;
        $this->authentication = $authentication;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        parent::configure();
        $this
            ->addArgument('file', InputArgument::REQUIRED, 'Path to a file containing the code to be evaluated. Check command help for instructions.')
            ->setDescription('Perform a request by evaluating PHP code.')
            ->setHelp(<<<'EOF'
The file should return a function with the following signature:

<?php

use OpenEuropa\EPoetry\RequestClientFactory;
use OpenEuropa\EPoetry\Console\Command\EvaluateRequestReturn;

return function(): EvaluateRequestReturn {
    // Build $object here...
    $request = (new CreateLinguisticRequest())
        ->setRequestDetails($requestDetails)
        ->setApplicationName('FOO')
        ->setTemplateName('WEBTRA');
    return new EvaluateRequestReturn($request, 'createLinguisticRequest');
};
EOF);
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $factory = new RequestClientFactory($this->endpoint, $this->authentication, $this->eventDispatcher, $this->logger);
        $file = $input->getArgument('file');
        if (!file_exists($file)) {
            $this->logger->error("File '{$file}' not found.");
            return 1;
        }
        $function = require $input->getArgument('file');
        /** @var EvaluateRequestReturn $return */
        $return = $function();
        $method = $return->getMethod();
        $request = $return->getRequest();
        $output->writeln('Request:');
        $output->writeln($this->serializer->serialize($request, 'json', [
            JsonEncode::OPTIONS => JSON_PRETTY_PRINT,
        ]));
        $response = $factory->getRequestClient()->{$method}($request);
        $this->logger->info('Endpoint: ' . $factory->getEndpoint());
        $this->logger->info('Proxy ticket: ' . $factory->getProxyTicket());
        $output->writeln('Response:');
        $output->writeln($this->serializer->serialize($response, 'json', [
            JsonEncode::OPTIONS => JSON_PRETTY_PRINT,
        ]));
        return 0;
    }
}
