<?php

namespace OpenEuropa\EPoetry\Authentication;

/**
 * Interface for ePoetry authentication plugins.
 *
 * The aim of each plugin is to return an authentication ticket that the ePoetry
 * SOAP client will use to authenticate against the backend service.
 */
interface AuthenticationInterface
{
    /**
     * Get authentication ticket.
     *
     * @return string
     *   Ticket string.
     */
    public function getTicket(): string;
}
