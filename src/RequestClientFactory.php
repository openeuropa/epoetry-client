<?php

namespace OpenEuropa\EPoetry;

use Http\Client\Common\PluginClient;
use Http\Discovery\Psr18ClientDiscovery;
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
use Soap\Engine\Transport;
use Soap\Engine\Engine;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\Psr18Transport\Middleware\SoapHeaderMiddleware;
use Soap\Psr18Transport\Psr18Transport;
use Soap\Xml\Builder\SoapHeader;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\Validator\ValidatorBuilder;
use function VeeWee\Xml\Dom\Builder\value;

class RequestClientFactory
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher ;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * @var Transport
     */
    protected $transport;

    /**
     * Proxy ticket.
     *
     * @var string
     */
    protected string $proxyTicket = '';

    /**
     * Constructs RequestClientFactory object.
     *
     * @param EventDispatcherInterface $eventDispatcher
     *   Event dispatcher.
     * @param LoggerInterface|null $logger
     *   Logger service.
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, LoggerInterface $logger = null)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->logger = $logger;
    }

    /**
     * Sets event dispatcher.
     *
     * @param EventDispatcherInterface $eventDispatcher
     *
     * @return $this
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): RequestClientFactory
    {
        $this->eventDispatcher = $eventDispatcher;
        return $this;
    }

    /**
     * Gets event dispatcher.
     *
     * @return EventDispatcherInterface|null
     */
    public function getEventDispatcher(): ?EventDispatcherInterface
    {
        return $this->eventDispatcher;
    }

    /**
     * Sets logger service.
     *
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger): RequestClientFactory
    {
        $this->logger = $logger;
        return $this;
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
     * Sets http client.
     *
     * @param ClientInterface $httpClient
     *
     * @return $this
     */
    public function setHttpClient(ClientInterface $httpClient): RequestClientFactory
    {
        $this->httpClient = $httpClient;
        return $this;
    }

    /**
     * Gets http client.
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient ?? Psr18ClientDiscovery::find();
    }

    /**
     * Sets proxy ticket to be added to soap header.
     *
     * @param string $proxyTicket
     *
     * @return $this
     */
    public function setProxyTicket(string $proxyTicket): RequestClientFactory
    {
        $this->proxyTicket = $proxyTicket;
        return $this;
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
     * Sets transport.
     *
     * @param Transport $transport
     *
     * @return $this
     */
    public function setTransport(Transport $transport): RequestClientFactory
    {
        $this->transport = $transport;
        return $this;
    }

    /**
     * Gets transport.
     *
     * @return Transport|null
     */
    public function getTransport(): ?Transport
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
        if ($this->proxyTicket) {
            // Add proxy ticket to the request header.
            $middlewarePlugin = new SoapHeaderMiddleware(
                new SoapHeader(
                    'https://ecas.ec.europa.eu/cas/schemas/ws',
                    'ecas:ProxyTicket',
                    value($this->proxyTicket),
                )
            );

            return Psr18Transport::createForClient(
                new PluginClient(
                    $this->getHttpClient(),
                    [$middlewarePlugin]
                )
            );
        }

        return Psr18Transport::createForClient($this->getHttpClient());
    }

    /**
     * Gets an engine.
     *
     * @param string $endpoint
     *   SOAP endpoint.
     *
     * @return Engine
     */
    protected function getEngine(string $endpoint): Engine
    {
        $transport = $this->transport ?? $this->getDefaultTransport();
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('DGTServiceWSPort', $endpoint);
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../resources/request.wsdl', [])
                ->withClassMap(RequestClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            $transport
        );

        return $engine;
    }

    /**
     * Gets request client.
     *
     * @param string $endpoint
     *   SOAP endpoint.
     *
     * @return RequestClient
     *   RequestClient instance.
     */
    public function getRequestClient(string $endpoint): RequestClient
    {
        // Build validator with Validator Subscriber.
        $validatorBuilder = new ValidatorBuilder();
        $validatorBuilder->addYamlMapping(__DIR__.'/../config/validator/request.yaml');
        $validator = $validatorBuilder->getValidator();
        $this->eventDispatcher->addSubscriber(new ValidatorSubscriber($validator));

        // Set logger, if any.
        if ($this->logger) {
            $this->eventDispatcher->addSubscriber(new LogSubscriber($this->logger));
        }

        // Build caller.
        $engine = $this->getEngine($endpoint);
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $this->eventDispatcher);

        // Build request client.
        return new RequestClient($caller);
    }

}
