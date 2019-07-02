<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Middleware;

use Http\Promise\Promise;
use OpenEuropa\EPoetry\Exception\ClientException;
use Phpro\SoapClient\Middleware\Middleware;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Phpro\SoapClient\Xml\SoapXml;
use Psr\Http\Message\RequestInterface;

/**
 * This middleware adds the CAS Proxy Ticket to the request object which, in turn,
 * is added to the XML header allowing to authenticate on the ePoetry service.
 */
class CasProxyTicketMiddleware extends Middleware implements MiddlewareInterface
{
    /**
     * The service to be used to get a Proxy Ticket
     * from CAS.
     *
     * @var CasProxyTicketInterface
     */
    protected $casProxyTicketService;

    /**
     * CasProxyTicketMiddleware constructor.
     *
     * @param CasProxyTicketInterface $casProxyTicketService
     *   The service to be used to get a Proxy Ticket from CAS.
     */
    public function __construct(CasProxyTicketInterface $casProxyTicketService)
    {
        $this->casProxyTicketService = $casProxyTicketService;
    }

    /**
     * {@inheritdoc}
     */
    public function beforeRequest(callable $handler, RequestInterface $request): Promise
    {
        $proxyTicket = $this->casProxyTicketService->getProxyTicket();

        if (empty($proxyTicket)) {
            throw new ClientException('[epoetry] no proxy ticket.');
        }

        $request = $this->addProxyTicket($request, $proxyTicket);

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
     * @param RequestInterface $request
     *    The PSR7 request.
     * @param string $proxyTicket
     *    The Proxy Ticket to send in SOAP header.
     *
     * @return RequestInterface
     *    The PSR7 request with manipulated XML.
     */
    private function addProxyTicket(RequestInterface $request, string $proxyTicket)
    {
        /** @var \Phpro\SoapClient\Xml\SoapXml $xml */
        $xml = SoapXml::fromStream($request->getBody());

        // XML manipulations.
        $newHeader = $xml->createSoapHeader();
        $xml->prependSoapHeader($newHeader);
        $xmlDocument = $xml->getXmlDocument();
        $element = $xmlDocument->createElement('ecas:ProxyTicket', $proxyTicket);
        $element->setAttribute('xmlns:ecas', 'https://ecas.ec.europa.eu/cas/schemas/ws');
        $newHeader->appendChild($element);

        return $request->withBody($xml->toStream());
    }
}
