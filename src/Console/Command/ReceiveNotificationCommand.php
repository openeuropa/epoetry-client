<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use OpenEuropa\EPoetry\Serializer\Serializer;
use OpenEuropa\EPoetry\ServerFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

class ReceiveNotificationCommand extends Command
{
    protected static $defaultName = 'receive-notification';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Receive a notification in ePoetry.')
            ->addOption('endpoint', null, InputOption::VALUE_REQUIRED, 'URL of the endpoint used in WSDL.', '')
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

        $factory = new ServerFactory($input->getOption('endpoint'), $adapter);
        $notificationServer = $factory->getSoapServer();

        $filepath = $input->getArgument('file');
        if (!file_exists($filepath)) {
            throw new FileNotFoundException(sprintf('File "%s" not found.', $filepath));
        }
        $request = file_get_contents($filepath);

        $response = $notificationServer->handle($request);

        $return = (new Serializer())->serialize($response, $input->getOption('out-format'));
        $output->writeln($return);
    }
}
