<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Authentication;

use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;

/**
 * Mock authentication plugin.
 */
class MockAuthentication implements AuthenticationInterface
{
    private string $ticket;

    /**
     * @param $ticket
     */
    public function __construct(string $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * @inheritDoc
     */
    public function getTicket(): string
    {
        return $this->ticket;
    }
}
