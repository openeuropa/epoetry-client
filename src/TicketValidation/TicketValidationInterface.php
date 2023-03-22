<?php

namespace OpenEuropa\EPoetry\TicketValidation;

use Psr\Http\Message\RequestInterface;

/**
 * Interface for ePoetry ticket validation plugins.
 *
 * The aim of each plugin is to validate a given authentication ticket.
 */
interface TicketValidationInterface
{
    /**
     * Authenticate given notification request.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *   Notification request.
     *
     * @return bool
     */
    public function validate(RequestInterface $request): bool;
}
