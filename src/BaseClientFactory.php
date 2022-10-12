<?php

namespace OpenEuropa\EPoetry;

use Http\Discovery\Psr18ClientDiscovery;
use Phpro\SoapClient\Event\Subscriber\LogSubscriber;
use Phpro\SoapClient\Event\Subscriber\ValidatorSubscriber;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Soap\Engine\Transport;
use Soap\Engine\Engine;
use Soap\Psr18Transport\Psr18Transport;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\ValidatorBuilder;

/**
 * Base class for client factories.
 */
abstract class BaseClientFactory
{
    /**
     * Event dispatcher service.
     *
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

    /**
     * Logger service.
     *
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * HTTP client.
     *
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * Transport.
     *
     * @var Transport
     */
    protected $transport;

    /**
     * SOAP endpoint.
     *
     * @var string
     */
    protected string $endpoint = '';

    /**
     * Constructs BaseClientFactory object.
     *
     * @param string $endpoint
     *   SOAP endpoint.
     * @param EventDispatcherInterface|null $eventDispatcher
     *   Event dispatcher service.
     * @param LoggerInterface|null $logger
     *   Logger service.
     * @param ClientInterface|null $httpClient
     *   HTTP client such as guzzle or symfony http-client.
     * @param Transport|null $transport
     *   Transport.
     */
    public function __construct(string $endpoint, EventDispatcherInterface $eventDispatcher = null, LoggerInterface $logger = null, ClientInterface $httpClient = null, Transport $transport = null)
    {
        $this->endpoint = $endpoint;
        $this->eventDispatcher = $eventDispatcher ?? new EventDispatcher();
        $this->logger = $logger;
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
        $this->transport = $transport ?? $this->getDefaultTransport();
    }

    /**
     * Gets an engine.
     *
     * @return Engine
     */
    abstract protected function getEngine(): Engine;

    /**
     * Gets event dispatcher.
     *
     * @return EventDispatcherInterface
     */
    public function getEventDispatcher(): EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    /**
     * Gets logger service.
     *
     * @return LoggerInterface|null
     */
    public function getLogger(): ?LoggerInterface
    {
        return $this->logger;
    }

    /**
     * Gets http client.
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Gets proxy ticket.
     *
     * @return string
     */
    public function getProxyTicket(): string
    {
        return $this->proxyTicket;
    }

    /**
     * Gets endpoint.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * Gets transport.
     *
     * @return Transport
     */
    public function getTransport(): Transport
    {
        return $this->transport;
    }

    /**
     * Gets transport if it wasn't provided.
     *
     * @return Transport
     */
    protected function getDefaultTransport(): Transport
    {
        $client = $this->getHttpClient();
        return Psr18Transport::createForClient($client);
    }

    /**
     * Adds validator subscriber.
     *
     * @param string $validationRulesPath
     *   Path to yaml file with validation rules.
     */
    protected function addValidator(string $validationRulesPath): void
    {
        // Build validator with Validator Subscriber.
        $validatorBuilder = new ValidatorBuilder();
        $validatorBuilder->addYamlMapping($validationRulesPath);
        $validator = $validatorBuilder->getValidator();
        $this->eventDispatcher->addSubscriber(new ValidatorSubscriber($validator));
    }

    /**
     * Adds log subscriber.
     */
    protected function addLogger($logger): void
    {
        $this->eventDispatcher->addSubscriber(new LogSubscriber($logger));
    }
}
