<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReceiveNotificationCommand extends Command
{
    protected static $defaultName = 'receive-notification';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setDescription('Receive a notification in ePoetry.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
