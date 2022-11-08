<?php

namespace OpenEuropa\EPoetry;

use Http\Client\Common\PluginClient;
use Http\Discovery\Psr18ClientDiscovery;
use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Event\Subscriber\LogSubscriber;
use Phpro\SoapClient\Event\Subscriber\ValidatorSubscriber;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Soap\Engine\Engine;
use Soap\Engine\Transport;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\Psr18Transport\Middleware\SoapHeaderMiddleware;
use Soap\Psr18Transport\Psr18Transport;
use Soap\Xml\Builder\SoapHeader;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use DOMElement;
use Symfony\Component\Validator\ValidatorBuilder;

/**
 * Request client factory.
 */
class RequestClientFactory
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
     * Authentication plugin.
     *
     * @var AuthenticationInterface
     */
    protected AuthenticationInterface $authentication;

    /**
     * Proxy ticket.
     *
     * This will be populated only after an actual request.
     *
     * @var string
     */
    protected string $proxyTicket = '';

    /**
     * Constructs RequestClientFactory object.
     *
     * @param string $endpoint
     * @param \OpenEuropa\EPoetry\Authentication\AuthenticationInterface $authentication
     * @param EventDispatcherInterface|null $eventDispatcher
     * @param LoggerInterface|null $logger
     * @param ClientInterface|null $httpClient
     * @param Transport|null $transport
     */
    public function __construct(string $endpoint, AuthenticationInterface $authentication, EventDispatcherInterface $eventDispatcher = null, LoggerInterface $logger = null, ClientInterface $httpClient = null, Transport $transport = null)
    {
        $this->endpoint = $endpoint;
        $this->eventDispatcher = $eventDispatcher ?? new EventDispatcher();
        $this->logger = $logger;
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
        $this->transport = $transport ?? $this->getDefaultTransport();
        $this->authentication = $authentication;
    }

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
     * Gets request client.
     *
     * @return RequestClient
     *   RequestClient instance.
     */
    public function getRequestClient(): RequestClient
    {
        $this->addValidator(__DIR__ . '/../config/validator/request.yaml');

        // Set logger, if any.
        if ($this->logger) {
            $this->addLogger($this->logger);
        }

        // Build caller.
        $caller = new EventDispatchingCaller(new EngineCaller($this->getEngine()), $this->eventDispatcher);

        // Build request client.
        return new RequestClient($caller);
    }

    /**
     * Gets transport if it wasn't provided.
     *
     * @return Transport
     */
    protected function getDefaultTransport(): Transport
    {
        // Wrap ticket in a callable, so the actual authentication request gets
        // fired only when sending a SOAP request.
        $getTicket = function (DOMElement $node): DOMElement {
            $this->proxyTicket = $this->authentication->getTicket();
            $node->nodeValue = $this->proxyTicket;
            return $node;
        };

        // Add proxy ticket to the request header.
        $middlewarePlugin = new SoapHeaderMiddleware(
            new SoapHeader(
                'https://ecas.ec.europa.eu/cas/schemas/ws',
                'ecas:ProxyTicket',
                $getTicket,
            )
        );
        $client = new PluginClient(
            $this->getHttpClient(),
            [$middlewarePlugin]
        );
        return Psr18Transport::createForClient($client);
    }

    /**
     * {@inheritdoc}
     */
    protected function getEngine(): Engine
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('DGTServiceWSPort', $this->endpoint);
        return DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../resources/request.wsdl', [])
                ->withClassMap(RequestClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            $this->transport
        );
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
