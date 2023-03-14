<?php

namespace OpenEuropa\EPoetry\TicketValidation;

/**
 * Interface for ePoetry ticket validation plugins.
 *
 * The aim of each plugin is to validate a given authentication ticket.
 */
interface TicketValidationInterface
{
    /**
     * Validate given ticket.
     *
     * @param string $ticket
     *   Ticket to be validated.
     *
     * @return bool
     */
    public function validate(string $ticket): bool;
}
