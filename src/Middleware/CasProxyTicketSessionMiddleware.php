<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Middleware;

use Http\Promise\Promise;
use Phpro\SoapClient\Middleware\Middleware;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\HttpFoundation\Session\Session;

class CasProxyTicketSessionMiddleware extends Middleware implements MiddlewareInterface
{
    private const PGT_ATTRIBUTE = 'cas_pgt';

    /**
     * The user session.
     *
     * @var Symfony\Component\HttpFoundation\Session\Session
     */
    protected $session;

    /**
     * CasProxyTicketMiddleware constructor.
     *
     * @param session $session
     *   The user session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function beforeRequest(callable $handler, RequestInterface $request): Promise
    {
        $proxyTicket = $this->getProxyTicket();
        if (empty($proxyTicket)) {
            throw new \Exception('[epoetry] session has no proxy ticket.');
        }

        // Add Proxy Ticket.
        $request = $request->withHeader('ecas:ProxyTicket', $proxyTicket);

        return $handler($request);
    }

    public function getName(): string
    {
        return 'cas_proxy_ticket_session_middleware';
    }

    public function getProxyTicket()
    {
        return $this->session->get(self::PGT_ATTRIBUTE);
    }
}
