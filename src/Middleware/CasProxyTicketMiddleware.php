<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Middleware;

use Http\Promise\Promise;
use Phpro\SoapClient\Middleware\Middleware;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Psr\Http\Message\RequestInterface;

class CasProxyTicketMiddleware extends Middleware implements MiddlewareInterface
{
    /**
     * The Proxy Ticket to add to requests.
     *
     * @var string
     */
    protected $proxyTicket;

    /**
     * CasProxyTicketMiddleware constructor.
     *
     * @param string $proxyTicket
     */
    public function __construct(string $proxyTicket = '')
    {
        $this->proxyTicket = $proxyTicket;
    }

    public function beforeRequest(callable $handler, RequestInterface $request): Promise
    {
        // Add Proxy Ticket.
        $request = $request->withHeader('ecas:ProxyTicket', $this->proxyTicket);

        return $handler($request);
    }

    public function getName(): string
    {
        return 'cas_proxy_ticket_middleware';
    }

    /**
     * Set the Proxy Ticket.
     *
     * @param string $proxyTicket
     *    The Proxy Ticket
     */
    public function setProxyTicket(string $proxyTicket)
    {
        $this->proxyTicket = $proxyTicket;
    }
}
