<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

use Http\Client\HttpClient;
use Phpro\SoapClient\ClientBuilder;
use Phpro\SoapClient\ClientFactory;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Phpro\SoapClient\Soap\Handler\HttPlugHandle;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Factory class for the ePoetry SOAP service.
 */
class EPoetryClientFactory
{

    /**
     * URI of the WSDL file.
     *
     * @var string
     */
    protected $wsdl;

    /**
     * PHP SOAP client options.
     *
     * @link http://php.net/manual/en/soapclient.soapclient.php
     *
     * @var array
     */
    protected $options = [];

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
     * List of Phpro\SoapClient middlewares.
     *
     * @var \Phpro\SoapClient\Middleware\MiddlewareInterface[]
     */
    protected $middlewares = [];

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

    /**
     * Set event dispatcher instance.
     *
     * Pass here an external application event dispatcher to be able to
     * subscribe to ePoetry events via the application's preferred methods.
     *
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
     *    Event dispatcher instance.
     *
     * @return \OpenEuropa\EPoetry\EPoetryClientFactory
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): EPoetryClientFactory
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
     * @param \Psr\Log\LoggerInterface $logger
     *    PSR3-compatible logger instance.
     *
     * @return \OpenEuropa\EPoetry\EPoetryClientFactory
     */
    public function setLogger(LoggerInterface $logger): EPoetryClientFactory
    {
        $this->logger = $logger;

        return $this;
    }

    /**
     * List of Phpro\SoapClient middlewares.
     *
     * Middlewares will be executed by the library during while performing
     * a request or handling a response.
     *
     * @link https://github.com/phpro/soap-client/blob/master/docs/middlewares.md
     *
     * @param \Phpro\SoapClient\Middleware\MiddlewareInterface $middleware
     *   Middleware instance.
     *
     * @return \OpenEuropa\EPoetry\EPoetryClientFactory
     */
    public function addMiddleware(MiddlewareInterface $middleware): EPoetryClientFactory
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
     * @return \OpenEuropa\EPoetry\EPoetryClient
     */
    public function getClient(): EPoetryClient
    {
        $clientFactory = new ClientFactory(EPoetryClient::class);
        $clientBuilder = new ClientBuilder($clientFactory, $this->wsdl, $this->options);
        $clientBuilder->withClassMaps(EPoetryClassmap::getCollection());

        if ($this->eventDispatcher) {
            $clientBuilder->withEventDispatcher($this->eventDispatcher);
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
