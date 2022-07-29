<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AuthenticateCommand extends Command
{
    protected static $defaultName = 'authenticate';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setDescription('Authenticate on EU Login.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
    }
}
