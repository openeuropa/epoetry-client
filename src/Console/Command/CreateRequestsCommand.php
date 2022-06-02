<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateRequestsCommand extends Command
{
    protected static $defaultName = 'create-requests';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setDescription('Build and send a CreateRequests to ePoetry.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
