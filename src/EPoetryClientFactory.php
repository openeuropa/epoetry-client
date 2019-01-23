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

class EPoetryClientFactory
{
    protected $eventDispatcher;
    protected $httpClient;
    protected $logger;
    protected $middlewares = [];
    protected $options = [];
    protected $wsdl;

    public function __construct(string $wsdl, HttpClient $httpClient, array $options = [])
    {
        $this->wsdl = $wsdl;
        $this->httpClient = $httpClient;
        $this->options = [
            'cache_wsdl' => WSDL_CACHE_NONE,
        ] + $options;
    }

    public function addMiddleware(MiddlewareInterface $middleware): self
    {
        $this->middlewares[] = $middleware;

        return $this;
    }

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

    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): self
    {
        $this->eventDispatcher = $eventDispatcher;

        return $this;
    }

    public function setLogger(LoggerInterface $logger): self
    {
        $this->logger = $logger;

        return $this;
    }
}
