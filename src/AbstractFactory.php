<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

use Http\Client\HttpClient;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Phpro\SoapClient\Soap\ClassMap\ClassMapCollection;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Abstract class for ePoetry factories.
 *
 * It can be used to get both Request and Notification clients.
 */
abstract class AbstractFactory
{
    /**
     * Service endpoint.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * Event dispatcher instance.
     *
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * HTTP Client.
     *
     * @var HttpClient
     */
    protected $httpClient;

    /**
     * PSR3 logger instance.
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Level of severity of the events to be logged.
     *
     * @var string
     */
    protected $logLevel = 'none';

    /**
     * SOAP class map collection.
     *
     * @var ClassMapCollection
     */
    protected $mapCollection;

    /**
     * List of Phpro\SoapClient middlewares.
     *
     * @var MiddlewareInterface[]
     */
    protected $middlewares = [];

    /**
     * PHP SOAP client options.
     *
     * @see http://php.net/manual/en/soapclient.soapclient.php
     *
     * @var array
     */
    protected $soapOptions = [];

    /**
     * Location of the client's WSDL file.
     *
     * @var string
     */
    protected $wsdlFile;

    /**
     * Location of the client's XSD file.
     *
     * @var string
     */
    protected $xsdFile;

    /**
     * ClientFactory constructor.
     *
     * @param string $endpoint
     *   The endpoint to be used in WSDL.
     * @param HttpClient $httpClient
     *   An HTTP Client to be used by service.
     * @param array $soapOptions
     */
    public function __construct($endpoint, HttpClient $httpClient, array $soapOptions = [])
    {
        $this->endpoint = $endpoint;
        $this->httpClient = $httpClient;
        $this->soapOptions = [
            'stream_context' => stream_context_create(),
            'cache_wsdl' => WSDL_CACHE_NONE,
        ] + $soapOptions;
    }

    /**
     * Add a middleware.
     *
     * Middlewares will be executed by the library while performing
     * a request or handling a response.
     *
     * @see https://github.com/phpro/soap-client/blob/master/docs/middlewares.md
     *
     * @param MiddlewareInterface $middleware
     *   Middleware instance
     *
     * @return $this
     */
    public function addMiddleware(MiddlewareInterface $middleware): ClientFactory
    {
        $this->middlewares[] = $middleware;

        return $this;
    }

    /**
     * Build the WSDL with file on resources.
     *
     * @return string
     */
    public function buildWsdl(): string
    {
        $wsdl = file_get_contents(__DIR__ . '/../resources/' . $this->wsdlFile);
        $wsdl = str_replace('%ENDPOINT%', $this->endpoint, $wsdl);

        $xsd = file_get_contents(__DIR__ . '/../resources/' . $this->xsdFile);
        $wsdl = str_replace($this->xsdFile, 'plain;base64,' . base64_encode($xsd), $wsdl);

        return 'data://text/plain;base64,' . base64_encode($wsdl);
    }

    /**
     * Set event dispatcher instance.
     *
     * Pass here an external application event dispatcher to be able to
     * subscribe to ePoetry events via the application's preferred methods.
     *
     * @param EventDispatcherInterface $eventDispatcher
     *    Event dispatcher instance
     *
     * @return $this
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): ClientFactory
    {
        $this->eventDispatcher = $eventDispatcher;

        return $this;
    }

    /**
     * Set PSR3-compatible logger instance.
     *
     * Pass here an external application PSR3-compatible logger instance to be
     * able to log ePoetry related messages within the application.
     *
     * @param LoggerInterface $logger
     *    PSR3-compatible logger instance
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger): ClientFactory
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * Set maximum level of severity of the events to be logged.
     *
     * @param string $logLevel
     *    Log level string
     *
     * @return $this
     */
    public function setLogLevel(string $logLevel): ClientFactory
    {
        $this->logLevel = $logLevel;

        return $this;
    }

    /**
     * Set notification data for client.
     *
     * @return $this
     */
    public function setNotificationData()
    {
        $this->wsdlFile = 'NotificationServiceWSDL.xml';
        $this->xsdFile = 'NotificationServiceXSD.xml';
        $this->mapCollection = NotificationClassmap::getCollection();

        return $this;
    }
}
