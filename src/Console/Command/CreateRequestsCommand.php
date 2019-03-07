<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use OpenEuropa\EPoetry\EPoetryClientFactory;
use OpenEuropa\EPoetry\Serializer\RequestsSerializer;
use OpenEuropa\EPoetry\Type\CreateRequests;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CreateRequestsCommand extends Command
{
    protected static $defaultName = 'create-requests';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Build and send a CreateRequests to ePoetry.')
            ->setHelp('')

            ->addOption('endpoint', null, InputOption::VALUE_REQUIRED, 'URL of the WSDL endpoint.', '')
            ->addOption('in-format', null, InputOption::VALUE_REQUIRED, 'Format for the input (e.g. xml, yaml).', 'xml')
            ->addOption('out-format', null, InputOption::VALUE_REQUIRED, 'Format for the output (e.g. xml, yaml).', 'xml')

            ->addArgument('request-file', InputArgument::REQUIRED, 'Path to a file containing the body of the request.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $guzzle = new GuzzleClient();
        $adapter = new GuzzleAdapter($guzzle);

        /** @var \OpenEuropa\EPoetry\EPoetryClientFactory $factory */
        $factory = new EPoetryClientFactory($input->getOption('endpoint'), $adapter);

        /** @var \OpenEuropa\EPoetry\EPoetryClient $client */
        $client = $factory->getClient();

        $createRequests = RequestsSerializer::fromFile(
            $input->getArgument('request-file'),
            CreateRequests::class,
            $input->getOption('in-format')
        );

        $response = $client->createRequests($createRequests);

        $return = (new RequestsSerializer())->serialize($response, $input->getOption('out-format'));
        $output->writeln($return);
    }
}
