<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;
use OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest;
use OpenEuropa\EPoetry\RequestClientFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\SerializerInterface;

class RequestCommand extends Command
{
    protected static $defaultName = 'request';

    private LoggerInterface $logger;

    private SerializerInterface $serializer;

    private EventDispatcherInterface $eventDispatcher;

    private AuthenticationInterface $authentication;

    public function __construct(LoggerInterface $logger, SerializerInterface $serializer, EventDispatcherInterface $eventDispatcher, AuthenticationInterface $authentication)
    {
        parent::__construct(null);
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
        $this->setDescription('Build and send a CreateRequests to ePoetry.')
            ->addArgument('payload', InputArgument::REQUIRED, 'Path to a file containing the ePoetry request payload, in YAML format. Check README.md for an example.')
            ->addOption('endpoint', 'e', InputOption::VALUE_REQUIRED, 'ePoetry service endpoint', 'https://webgate.acceptance.ec.europa.eu/epoetrytst/epoetry/webservices/dgtService');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $payloadPath = $input->getArgument('payload');
        if (!file_exists($payloadPath)) {
            $this->logger->error("File '{$payloadPath}' not found.");
            return 1;
        }

        $content = file_get_contents($payloadPath);
        $object = $this->serializer->deserialize($content, CreateLinguisticRequest::class, 'yaml');

        $factory = new RequestClientFactory($input->getOption('endpoint'), $this->authentication, $this->eventDispatcher, $this->logger);
        $client = $factory->getRequestClient();

        $response = $client->createLinguisticRequest($object);
        $this->logger->info('Endpoint: ' . $factory->getEndpoint());
        $this->logger->info('Proxy ticket: ' . $factory->getProxyTicket());
        $output->writeln($this->serializer->serialize($response, 'json', [
            JsonEncode::OPTIONS => JSON_PRETTY_PRINT,
        ]));
        return 0;
    }
}
