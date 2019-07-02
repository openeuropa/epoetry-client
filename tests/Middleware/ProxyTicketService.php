<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Middleware;

use OpenEuropa\EPoetry\Middleware\CasProxyTicketInterface;

/**
 * Mock a Proxy Ticket service.
 *
 * To simulate the service, this class generates a Proxy Ticket based
 * in a previously given Proxy Grating Ticket (PGT). Usually PGT lives in
 * session and will be sent to CAS service that will return a PT.
 * For testinf proposes, this mock service will just
 * use the given PGT to return it with PGT string replaced with PT.
 */
class ProxyTicketService implements CasProxyTicketInterface
{
    /**
     * The Proxy Granting Ticket.
     *
     * @var pgt
     */
    protected $pgt;

    /**
     * ProxyTicketService constructor.
     *
     * @param string $pgt
     *   The Proxy Granting Ticket.
     */
    public function __construct($pgt)
    {
        $this->pgt = $pgt;
    }

    /**
     * Return a mocked Proxy Ticket.
     *
     * @return string
     *   The Proxy Ticket.
     */
    public function getProxyTicket(): string
    {
        return str_replace('PGT', 'PT', $this->pgt);
    }
}
