<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use OpenEuropa\EPoetry\RequestClientFactory;
use Symfony\Bridge\Monolog\Handler\ConsoleHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Psr\Log\LoggerInterface;

class RequestCommand extends Command
{
    protected static $defaultName = 'request';

    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        parent::__construct(null);
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setDescription('Build and send a CreateRequests to ePoetry.')
            ->addArgument('endpoint', InputArgument::REQUIRED, 'ePoetry service endpoint')
            ->addArgument('ticket', InputArgument::REQUIRED, 'Authentication ticket')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $client = RequestClientFactory::factory($input->getArgument('endpoint'), $this->logger);
        return 0;
    }
}
