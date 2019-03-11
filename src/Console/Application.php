<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console;

use OpenEuropa\EPoetry\Console\Command\CreateRequestsCommand;
use Symfony\Component\Console\Application as SymfonyApplication;

/**
 * This Application is the container for a collection of commands for ePoetry.
 *
 * It provides default commands to build and send requests.
 * (e.g. CreateRequests)
 */
class Application extends SymfonyApplication
{
    /**
     * {@inheritdoc}
     */
    protected function getDefaultCommands(): array
    {
        $commands = parent::getDefaultCommands();
        $commands[] = new CreateRequestsCommand();

        return $commands;
    }
}
