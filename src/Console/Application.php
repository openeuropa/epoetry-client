<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console;

use OpenEuropa\EPoetry\Console\Command\CreateRequestsCommand;
use Symfony\Component\Console\Application as SymfonyApplication;

/**
 * Class Application.
 */
class Application extends SymfonyApplication
{
    const APP_NAME = 'Epoetry';
    const APP_VERSION = '0.0.1';

    /**
     * Set up application:.
     */
    public function __construct()
    {
        parent::__construct(self::APP_NAME, self::APP_VERSION);
    }

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
