<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Middleware;

use Http\Promise\Promise;
use OpenEuropa\EPoetry\Exception\ClientException;
use Phpro\SoapClient\Middleware\Middleware;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Psr\Http\Message\RequestInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class CasProxyTicketSessionMiddleware.
 *
 * This middleware adds the CAS Proxy Granting Ticket to the request object which, in turn,
 * is added to the XML header allowing to authenticate on the ePoetry service.
 */
class CasProxyTicketSessionMiddleware extends Middleware implements MiddlewareInterface
{
    protected const PGT_ATTRIBUTE = 'cas_pgt';

    /**
     * The session.
     *
     * @var SessionInterface
     */
    protected $session;

    /**
     * CasProxyTicketSessionMiddleware constructor.
     *
     * @param $session SessionInterface
     *   The session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * {@inheritdoc}
     */
    public function beforeRequest(callable $handler, RequestInterface $request): Promise
    {
        $proxyTicket = $this->getProxyTicket();
        if (empty($proxyTicket)) {
            throw new ClientException('[epoetry] session has no proxy ticket.');
        }

        // Add Proxy Ticket.
        $request = $request->withHeader('ecas:ProxyTicket', $proxyTicket);

        return $handler($request);
    }

    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'cas_proxy_ticket_session_middleware';
    }

    /**
     * Get the Proxy Ticket.
     *
     * @return string
     *   The Proxy Ticket
     */
    public function getProxyTicket()
    {
        return $this->session->get(self::PGT_ATTRIBUTE);
    }
}
