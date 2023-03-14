<?php

namespace OpenEuropa\EPoetry;

use GuzzleHttp\Psr7\Response;
use Http\Message\Formatter\FullHttpMessageFormatter;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Notification\Exception\NotificationException;
use OpenEuropa\EPoetry\Notification\Exception\NotificationValidationException;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\NotificationHandler;
use OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;
use Soap\ExtSoapEngine\Configuration\TypeConverter\TypeConverterCollection;
use Soap\ExtSoapEngine\ExtSoapOptionsResolverFactory;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Soap\ExtSoapEngine\Configuration\TypeConverter;
use VeeWee\Xml\Dom\Traverser\Visitor\RemoveNamespaces;
use function VeeWee\Xml\Dom\Configurator\traverse;
use function VeeWee\Xml\Encoding\xml_decode;

class NotificationServerFactory
{

    /**
     * Callback URL, where notifications are supposed to be sent by ePoetry.
     *
     * @var string
     */
    protected string $callback;

    /**
     * Event dispatcher service.
     *
     * @var EventDispatcherInterface
     */
    protected EventDispatcherInterface $eventDispatcher;

    /**
     * Logger service.
     *
     * @var LoggerInterface
     */
    protected LoggerInterface $logger;

    /**
     * Serializer service.
     *
     * @var \Symfony\Component\Serializer\SerializerInterface
     */
    protected SerializerInterface $serializer;

    /**
     * Ticket validation service.
     *
     * @var \OpenEuropa\EPoetry\TicketValidation\TicketValidationInterface
     */
    protected TicketValidationInterface $ticketValidation;

    /**
     * Constructs NotificationServerFactory object.
     *
     * @param string $callback
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
     * @param \Psr\Log\LoggerInterface $logger
     * @param \Symfony\Component\Serializer\SerializerInterface $serializer
     */
    public function __construct(string $callback, EventDispatcherInterface $eventDispatcher, LoggerInterface $logger, SerializerInterface $serializer, TicketValidationInterface $ticketValidation)
    {
        $this->callback = $callback;
        $this->eventDispatcher = $eventDispatcher;
        $this->logger = $logger;
        $this->serializer = $serializer;
        $this->ticketValidation = $ticketValidation;
    }

    /**
     * Handle request.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(RequestInterface $request): ResponseInterface
    {
        // Extract proxy ticket, if any.
        $ticket = $this->extractTicket($request);
        if ($this->ticketValidation->validate($ticket) === false) {
            $this->logger->error('Ticket validation failed for {ticket}.', [
                'ticket' => $ticket,
            ]);
            throw new NotificationException('Ticket validation failed.');
        }

        $formatter = new FullHttpMessageFormatter(null);
        $handler = new NotificationHandler($this->eventDispatcher, $this->logger, $this->serializer);
        $server = new \SoapServer($this->getEncodedWsdl(), ExtSoapOptionsResolverFactory::create()->resolve([
            'classmap' => NotificationClassmap::getCollection(),
            'typemap' => new TypeConverterCollection([
                new TypeConverter\DateTimeTypeConverter(),
                new TypeConverter\DateTypeConverter(),
            ]),

        ]));
        $server->setObject($handler);

        ob_start();
        try {
            $this->logger->info("Received notification:\n{request}", [
                'request' => $formatter->formatRequest($request),
            ]);
            $server->handle($request->getBody()->getContents());
            $xml = ob_get_contents();
            ob_end_clean();
        } catch (\Exception $exception) {
            // Make sure we clean the opened buffer, if an exception occurred,
            // then throw the caught exception.
            ob_end_clean();
            throw new NotificationException($exception->getMessage(), $exception->getCode(), $exception);
        }

        $response = new Response(200, ['content-type' => 'text/xml'], $xml);
        $this->logger->info("Returned response:\n{response}", [
            'response' => $formatter->formatResponseForRequest($response, $request),
        ]);
        return $response;
    }

    /**
     * Get WSDL as a plain XML string.
     *
     * @return string
     */
    public function getWsdl(): string
    {
        return file_get_contents($this->getEncodedWsdl());
    }

    /**
     * Extract proxy ticket.
     *
     * @param \Psr\Http\Message\RequestInterface $request
     *   Notification request.
     *
     * @return string
     *
     * @throws \OpenEuropa\EPoetry\Notification\Exception\NotificationValidationException
     */
    private function extractTicket(RequestInterface $request): string
    {
        if ($request->hasHeader('SOAPAction') === false) {
            throw new NotificationValidationException('Header "SOAPAction" is missing from notification request.');
        }
        $header = $request->getHeaderLine('SOAPAction');
        if ($header !== 'http://eu.europa.ec.dgt.epoetry/DgtClientNotificationReceiverWS/receiveNotificationRequest') {
            throw new NotificationValidationException('Header "SOAPAction" must be set to "http://eu.europa.ec.dgt.epoetry/DgtClientNotificationReceiverWS/receiveNotificationRequest"');
        }
        $body = $request->getBody()->getContents();
        try {
            $data = xml_decode($body, traverse(new RemoveNamespaces()));
        } catch (\Throwable $exception) {
            throw new NotificationValidationException('Request body is not a valid XML.', $exception->getCode(), $exception);
        }
        if (!isset($data['Envelope']['Header']['ProxyTicket'])) {
            throw new NotificationValidationException('Request body element <ProxyTicket/> not found.');
        }
        $ticket = trim($data['Envelope']['Header']['ProxyTicket']);
        if (empty($ticket)) {
            throw new NotificationValidationException('Request body element <ProxyTicket/> found, but empty.');
        }
        return $ticket;
    }

    /**
     * Get WSDL as a base64 encoded file URI.
     *
     * @return string
     */
    private function getEncodedWsdl(): string
    {
        $provider = new LocalWsdlProvider();
        $provider->withPortLocation('DgtClientNotificationReceiverWSPort', $this->callback);
        return $provider(__DIR__. '/../resources/notification.wsdl');
    }
}
