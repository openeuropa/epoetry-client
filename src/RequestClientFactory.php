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
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Validator\ValidatorBuilder;
use function VeeWee\Xml\Dom\Builder\value;

class RequestClientFactory
{
    /**
     * @var EventDispatcherInterface
     */
    protected $eventDispatcher;

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
     * SOAP endpoint.
     *
     * @var string
     */
    protected string $endpoint = '';

    /**
     * Proxy ticket.
     *
     * @var string
     */
    protected string $proxyTicket = '';

    /**
     * Constructs RequestClientFactory object.
     *
     * @param string $endpoint
     * @param string $proxyTicket
     *   Proxy ticket is used to build default transport. It should be omitted if custom transport is provided.
     * @param EventDispatcherInterface|null $eventDispatcher
     * @param LoggerInterface|null $logger
     * @param ClientInterface|null $httpClient
     * @param Transport|null $transport
     */
    public function __construct(string $endpoint, string $proxyTicket = '', EventDispatcherInterface $eventDispatcher = null, LoggerInterface $logger = null, ClientInterface $httpClient = null, Transport $transport = null)
    {
        $this->endpoint = $endpoint;
        $this->proxyTicket = $proxyTicket;
        $this->eventDispatcher = $eventDispatcher ?? new EventDispatcher();
        $this->logger = $logger;
        $this->httpClient = $httpClient ?? Psr18ClientDiscovery::find();
        $this->transport = $transport ?? $this->getDefaultTransport();
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
        if ($this->proxyTicket) {
            // Add proxy ticket to the request header.
            $middlewarePlugin = new SoapHeaderMiddleware(
                new SoapHeader(
                    'https://ecas.ec.europa.eu/cas/schemas/ws',
                    'ecas:ProxyTicket',
                    value($this->proxyTicket),
                )
            );
            $client = new PluginClient(
                $client,
                [$middlewarePlugin]
            );
        }
        return Psr18Transport::createForClient($client);
    }

    /**
     * Gets an engine.
     *
     * @return Engine
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
     * Gets request client.
     *
     * @return RequestClient
     *   RequestClient instance.
     */
    public function getRequestClient(): RequestClient
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
        $engine = $this->getEngine();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $this->eventDispatcher);

        // Build request client.
        return new RequestClient($caller);
    }

}
