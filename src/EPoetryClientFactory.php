<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

use Http\Client\HttpClient;
use OpenEuropa\EPoetry\Services\LoggerDecorator;
use OpenEuropa\EPoetry\Services\LoggerSubscriber;
use Phpro\SoapClient\ClientBuilder;
use Phpro\SoapClient\ClientFactory;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Phpro\SoapClient\Soap\Handler\HttPlugHandle;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Factory class for the ePoetry SOAP service.
 */
class EPoetryClientFactory
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
    public function __construct(string $endpoint, HttpClient $httpClient, array $options = [])
    {
        $this->wsdl = $this->buildWsdl($endpoint);
        $this->httpClient = $httpClient;
        $this->options = [
            'stream_context' => stream_context_create(),
            'cache_wsdl' => WSDL_CACHE_NONE,
        ] + $options;
    }

    /**
     * List of Phpro\SoapClient middlewares.
     *
     * Middlewares will be executed by the library during while performing
     * a request or handling a response.
     *
     * @see https://github.com/phpro/soap-client/blob/master/docs/middlewares.md
     *
     * @param \Phpro\SoapClient\Middleware\MiddlewareInterface $middleware
     *   Middleware instance
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
     * @param \Symfony\Component\EventDispatcher\EventDispatcherInterface $eventDispatcher
     *    Event dispatcher instance
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
     *    PSR3-compatible logger instance
     *
     * @return \OpenEuropa\EPoetry\EPoetryClientFactory
     */
    public function setLogger(LoggerInterface $logger): EPoetryClientFactory
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
     * @return \OpenEuropa\EPoetry\EPoetryClientFactory
     */
    public function setLogLevel(string $logLevel): EPoetryClientFactory
    {
        $this->logLevel = $logLevel;

        return $this;
    }

    /**
     * Build the WSDL with file on resources.
     *
     * @param string $endpoint
     *    Endpoint url
     *
     * @return string
     */
    private function buildWsdl(string $endpoint): string
    {
        $wsdl = file_get_contents(__DIR__ . '/../resources/dgtServiceWSDL.xml');
        $wsdl = str_replace('%ENDPOINT%', $endpoint, $wsdl);

        $xsd = file_get_contents(__DIR__ . '/../resources/dgtServiceXSD.xml');
        $wsdl = str_replace('dgtServiceXSD.xml', 'plain;base64,' . base64_encode($xsd), $wsdl);

        return 'data://text/plain;base64,' . base64_encode($wsdl);
    }
}
