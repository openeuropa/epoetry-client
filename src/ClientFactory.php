<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

use Http\Client\HttpClient;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\NotificationClient;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use OpenEuropa\EPoetry\Services\LoggerDecorator;
use OpenEuropa\EPoetry\Services\LoggerSubscriber;
use Phpro\SoapClient\ClientInterface;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Phpro\SoapClient\Soap\ClassMap\ClassMapCollection;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapEngineFactory;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;
use Phpro\SoapClient\Soap\Handler\HttPlugHandle;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Factory class for the ePoetry client.
 *
 * It can be used to get both Request and Notification clients.
 */
class ClientFactory
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
     * Get a notification client instance.
     *
     * @return \OpenEuropa\EPoetry\Notification\NotificationClient
     */
    public function getNotificationClient(): ClientInterface
    {
        return $this->buildClient(
            NotificationClient::class,
            'NotificationServiceWSDL.xml',
            'NotificationServiceXSD.xml',
            NotificationClassmap::getCollection()
        );
    }

    /**
     * Get a request client instance.
     *
     * @return \OpenEuropa\EPoetry\Request\RequestClient
     */
    public function getRequestClient(): ClientInterface
    {
        return $this->buildClient(
            RequestClient::class,
            'dgtServiceWSDL.xml',
            'dgtServiceXSD.xml',
            RequestClassmap::getCollection()
        );
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
     * Build and return an ePoetry client instance.
     *
     * Make sure you set/add logger, event dispatcher and middlewares before
     * calling this method.
     *
     * @param string $clientName
     *    Client class name.
     * @param string $wsdlFile
     *    Location of the client's WSDL file.
     * @param string $xsdFile
     *    Location of the client's XSD file.
     * @param \Phpro\SoapClient\Soap\ClassMap\ClassMapCollection $classMap
     *    SOAP class map collection.
     *
     * @return \Phpro\SoapClient\ClientInterface
     *    Client instance.
     */
    protected function buildClient(string $clientName, string $wsdlFile, string $xsdFile, ClassMapCollection $classMap): ClientInterface
    {
        $wsdl = $this->buildWsdl($this->endpoint, $wsdlFile, $xsdFile);

        $handler = HttPlugHandle::createForClient($this->httpClient);
        if ($this->middlewares) {
            foreach ($this->middlewares as $middleware) {
                $handler->addMiddleware($middleware);
            }
        }

        $engine = ExtSoapEngineFactory::fromOptionsWithHandler(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap($classMap),
            $handler
        );

        $this->eventDispatcher = $this->eventDispatcher ?? new EventDispatcher();

        if ($this->logger) {
            $logger = new LoggerDecorator($this->logger, $this->logLevel);
            $logPlugin = new LoggerSubscriber($logger);
            $this->eventDispatcher->addSubscriber($logPlugin);
        }

        return new $clientName($engine, $this->eventDispatcher);
    }

    /**
     * Build the WSDL with file on resources.
     *
     * @param string $endpoint
     *    Endpoint url
     * @param string $wsdlFile
     *    Name of the WSDL file.
     * @param string $xsdFile
     *    Name of the XSD file.
     *
     * @return string
     */
    protected function buildWsdl(string $endpoint, string $wsdlFile, string $xsdFile): string
    {
        $wsdl = file_get_contents(__DIR__ . '/../resources/' . $wsdlFile);
        $wsdl = str_replace('%ENDPOINT%', $endpoint, $wsdl);

        $xsd = file_get_contents(__DIR__ . '/../resources/' . $xsdFile);
        $wsdl = str_replace($xsdFile, 'plain;base64,' . base64_encode($xsd), $wsdl);

        return 'data://text/plain;base64,' . base64_encode($wsdl);
    }
}
