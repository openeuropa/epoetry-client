<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification;

use Http\Client\HttpClient;
use Phpro\SoapClient\ClientFactory as PhproClientFactory;
use Phpro\SoapClient\ClientBuilder;
use Phpro\SoapClient\ClientFactory;
use OpenEuropa\EPoetry\Services\LoggerDecorator;
use OpenEuropa\EPoetry\Services\LoggerSubscriber;
use Phpro\SoapClient\Soap\Handler\HttPlugHandle;
use Symfony\Component\EventDispatcher\EventDispatcher;

class EPoetryNotificationClientFactory
{
    /**
     * Event dispatcher instance.
     *
     * @var \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * HTTP Client.
     *
     * @var \Http\Client\HttpClient
     */
    protected $httpClient;

    /**
     * PSR3 logger instance.
     *
     * @var \Psr\Log\LoggerInterface
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
     * @var \Phpro\SoapClient\Middleware\MiddlewareInterface[]
     */
    protected $middlewares = [];

    /**
     * PHP SOAP client options.
     *
     * @see http://php.net/manual/en/soapclient.soapclient.php
     *
     * @var array
     */
    protected $options = [];

    /**
     * URI of the WSDL file.
     *
     * @var string
     */
    protected $wsdl;

    /**
     * Factory constructor.
     */
    public function __construct(string $wsdl, HttpClient $httpClient, array $options = [])
    {
        $this->wsdl = $wsdl;
        $this->httpClient = $httpClient;
        $this->options = [
            'cache_wsdl' => WSDL_CACHE_NONE,
        ] + $options;
    }

    public static function factory(string $wsdl): EPoetryNotificationClient
    {
        $clientFactory = new PhproClientFactory(EPoetryNotificationClient::class);
        $clientBuilder = new ClientBuilder($clientFactory, $wsdl, []);
        $clientBuilder->withClassMaps(EPoetryNotificationClassmap::getCollection());

        return $clientBuilder->build();
    }

    /**
     * Construct and return an ePoetry client instance.
     *
     * Make sure you set/add logger, event dispatcher and middlewares before
     * calling this method.
     *
     * @return \OpenEuropa\EPoetry\EPoetryClient
     */
    public function getClient(): EPoetryNotificationClient
    {
        $clientFactory = new ClientFactory(EPoetryNotificationClient::class);
        $clientBuilder = new ClientBuilder($clientFactory, $this->wsdl, $this->options);
        $clientBuilder->withClassMaps(EPoetryNotificationClassmap::getCollection());

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
}
