<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

use Http\Client\HttpClient;
use OpenEuropa\EPoetry\Services\LoggerDecorator;
use OpenEuropa\EPoetry\Services\LoggerSubscriber;
use Phpro\SoapClient\ClientBuilder;
use Phpro\SoapClient\ClientFactory as SoapClientFactory;
use Phpro\SoapClient\ClientInterface;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Phpro\SoapClient\Soap\Handler\HttPlugHandle;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Factory class for client of ePoetry SOAP service.
 *
 * It can be used to get both Request or Notification clients.
 */
abstract class ClientFactory
{
    /**
     * Name of client class.
     *
     * @var string
     */
    protected $clientName;

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
     * SOAP client factory.
     *
     * @var SoapClientFactory
     */
    protected $soapClientFactory;

    /**
     * PHP SOAP client options.
     *
     * @see http://php.net/manual/en/soapclient.soapclient.php
     *
     * @var array
     */
    protected $soapOptions = [];

    /**
     * URI of the WSDL file.
     *
     * @var string
     */
    protected $wsdl;

    /**
     * ClientFactory constructor.
     *
     * @param string $endpoint
     *   The endpoint to be used in WSDL.
     * @param HttpClient $httpClient
     *   An HTTP Client to be used by service.
     */
    public function __construct($endpoint, HttpClient $httpClient)
    {
        $this->soapClientFactory = new SoapClientFactory($this->clientName);
        $this->httpClient = $httpClient;
        $this->wsdl = $this->buildWsdl($endpoint);
        $this->soapOptions = [
            'stream_context' => stream_context_create(),
            'cache_wsdl' => WSDL_CACHE_NONE,
        ];
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
     * Construct and return an ePoetry client instance.
     *
     * Make sure you set/add logger, event dispatcher and middlewares before
     * calling this method.
     *
     * @return ClientInterface
     */
    public function getClient(): ClientInterface
    {
        $clientBuilder = new ClientBuilder($this->soapClientFactory, $this->wsdl, $this->soapOptions);
        $clientBuilder->withClassMaps($this->getClassMapCollection());

        $this->eventDispatcher = $this->eventDispatcher ?? new EventDispatcher();
        $clientBuilder->withEventDispatcher($this->eventDispatcher);

        if ($this->logger) {
            $logger = new LoggerDecorator($this->logger, $this->logLevel);
            $logPlugin = new LoggerSubscriber($logger);
            $this->eventDispatcher->addSubscriber($logPlugin);
        }

        $handler = HttPlugHandle::createForClient($this->httpClient);
        $clientBuilder->withHandler($handler);

        if ($this->middlewares) {
            foreach ($this->middlewares as $middleware) {
                $handler->addMiddleware($middleware);
            }
        }

        return $clientBuilder->build();
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
     * Set SOAP options.
     *
     * @param array $soapOptions
     *   The SOAP options.
     */
    public function setSoapOptions($soapOptions)
    {
        $this->soapOptions += $soapOptions;
    }
}
