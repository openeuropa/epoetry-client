<?php

namespace OpenEuropa\EPoetry\Tests\TicketValidation;

use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;

class NoopTicketValidation implements TicketValidationInterface
{
    /**
     * {@inheritDoc}
     */
    public function validate(string $ticket): bool
    {
        return true;
    }
}
