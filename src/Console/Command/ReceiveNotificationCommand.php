<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use OpenEuropa\EPoetry\Notification\NotificationClientFactory;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use OpenEuropa\EPoetry\Serializer\Serializer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ReceiveNotificationCommand extends Command
{
    protected static $defaultName = 'receive-notification';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Build and receive a notification in ePoetry Client.')
            ->addOption('endpoint', null, InputOption::VALUE_REQUIRED, 'URL of the WSDL endpoint.', '')
            ->addOption('in-format', null, InputOption::VALUE_REQUIRED, 'Format for the input (e.g. xml, yaml).', 'xml')
            ->addOption('out-format', null, InputOption::VALUE_REQUIRED, 'Format for the output (e.g. xml, yaml).', 'xml')
            ->addArgument('file', InputArgument::REQUIRED, 'Path to a file containing the body of the notification.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // Instantiate HTTP client.
        $guzzle = new GuzzleClient();
        $adapter = new GuzzleAdapter($guzzle);

        /** @var \OpenEuropa\EPoetry\Notification\NotificationClientFactory $factory */
        $factory = new NotificationClientFactory($input->getOption('endpoint'), $adapter);

        /** @var \OpenEuropa\EPoetry\Notification\NotificationClient $client */
        $client = $factory->getClient();

        $notification = Serializer::fromFile(
            $input->getArgument('file'),
            ReceiveNotification::class,
            $input->getOption('in-format')
        );

        $response = $client->receiveNotification($notification);

        $return = (new Serializer())->serialize($response, $input->getOption('out-format'));
        $output->writeln($return);
    }
}
