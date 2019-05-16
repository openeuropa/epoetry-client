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
    /**
     * The object to be used to get a Proxy Ticket.
     *
     * @var string
     */
    protected $proxyTicketObject;
    /**
     * The method to be called to get a Proxy Ticket.
     *
     * @var string
     */
    protected $proxyTicketMethod;

    /**
     * CasProxyTicketSessionMiddleware constructor.
     *
     * @param object $proxyTicketObject
     *   The object to be used to get a Proxy Ticket.
     *
     * @param string $proxyTicketMethod
     *   The method to be called to get a Proxy Ticket.
     */
    public function __construct($proxyTicketObject, string $proxyTicketMethod)
    {
        $this->proxyTicketObject = $proxyTicketObject;
        $this->proxyTicketMethod = $proxyTicketMethod;
    }

    /**
     * {@inheritdoc}
     */
    public function beforeRequest(callable $handler, RequestInterface $request): Promise
    {
        if (empty($this->proxyTicketObject)) {
            throw new ClientException('[epoetry] no proxy ticket object.');
        }
        if (empty($this->proxyTicketMethod)) {
            throw new ClientException('[epoetry] no proxy ticket method.');
        }

        $object = $this->proxyTicketObject;
        $method = $this->proxyTicketMethod;
        $proxyTicket = $object->$method();

        if (empty($proxyTicket)) {
            throw new ClientException('[epoetry] no proxy ticket.');
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
}
