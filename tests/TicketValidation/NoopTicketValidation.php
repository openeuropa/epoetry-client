<?php

namespace OpenEuropa\EPoetry\Tests\TicketValidation;

use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;
use Psr\Http\Message\RequestInterface;

class NoopTicketValidation implements TicketValidationInterface
{
    /**
     * {@inheritDoc}
     */
    public function validate(RequestInterface $request): bool
    {
        return true;
    }
}
