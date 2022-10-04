<?php

namespace OpenEuropa\EPoetry\Authentication;

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
