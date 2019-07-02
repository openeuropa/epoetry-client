<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Middleware;

interface CasProxyTicketInterface
{
    /**
     * Get Proxy Ticket from CAS service.
     *
     * @return string
     *   The Proxy Ticket.
     */
    public function getProxyTicket(): string;
}
