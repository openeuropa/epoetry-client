<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Middleware;

interface CasProxyTicketInterface {

    /**
     * Get Proxy Ticket from CAS service.
     *
     * @return string
     */
    public function getProxyTicket(): string;
}
