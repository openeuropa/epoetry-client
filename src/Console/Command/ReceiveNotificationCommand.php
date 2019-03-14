<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use Http\Discovery\HttpClientDiscovery;
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
        /** @var \OpenEuropa\EPoetry\Notification\Type\ReceiveNotification $receiveNotification */
        $receiveNotification = Serializer::fromFile(
            $input->getArgument('file'),
            ReceiveNotification::class,
            $input->getOption('in-format')
        );

        $httpClient = HttpClientDiscovery::find();
        $factory = new NotificationClientFactory($input->getOption('endpoint'), $httpClient);
        $notificationClient = $factory->getClient();

        $response = $notificationClient->receiveNotification($receiveNotification);

        $return = (new Serializer())->serialize($response, $input->getOption('out-format'));
        $output->writeln($return);
    }
}
