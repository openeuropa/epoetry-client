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
     * Validate given ticket against given job account.
     *
     * Validation is successful if the implementation class can establish that
     * the given ticket is valid, and it identifies the given job account.
     *
     * @param string $account
     *   Job account identifier.
     * @param string $ticket
     *   Ticket to be validated.
     *
     * @return bool
     */
    public function validate(string $account, string $ticket): bool;
}
