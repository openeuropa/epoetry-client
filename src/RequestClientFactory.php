<?php

namespace OpenEuropa\EPoetry;

use Http\Client\Common\PluginClient;
use Http\Discovery\Psr18ClientDiscovery;
use OpenEuropa\EPoetry\Authentication\AuthenticationInterface;
use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Logger\LoggerPlugin;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use OpenEuropa\EPoetry\Request\Type;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Event\Subscriber\LogSubscriber;
use Phpro\SoapClient\Event\Subscriber\ValidatorSubscriber;
use Psr\Http\Client\ClientInterface;
use Psr\Log\LoggerInterface;
use Soap\Engine\Engine;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Phpro\SoapClient\Soap\EngineOptions;
use Soap\Encoding\EncoderRegistry;
use Soap\Engine\Transport;
use Soap\Psr18Transport\Middleware\SoapHeaderMiddleware;
use Soap\Psr18Transport\Psr18Transport;
use Soap\Xml\Builder\SoapHeader;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
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
    public function __construct(string $endpoint, AuthenticationInterface $authentication, ?EventDispatcherInterface $eventDispatcher = null, ?LoggerInterface $logger = null, ?ClientInterface $httpClient = null, ?Transport $transport = null)
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
        // The type of the $node depends on the version of the library which
        // in turn depend on the version of php.

        $getTicket = function (mixed /* \DOMElement|\Dom\Element */ $node): mixed /* \DOMElement|\Dom\Element */ {
            $this->proxyTicket = $this->authentication->getTicket();
            if ($node instanceof \DOMElement) {
                $node->nodeValue = $this->proxyTicket;
            } else {
                $node->textContent = $this->proxyTicket;
            }
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
        $plugins = [
            $middlewarePlugin,
        ];

        // Add HTTP logging middleware.
        if ($this->logger instanceof LoggerInterface) {
            $plugins[] = new LoggerPlugin($this->logger);
        }

        $client = new PluginClient($this->getHttpClient(), $plugins);
        return Psr18Transport::createForClient($client);
    }

    /**
     * Builds the encoder registry with classmaps for the v4 SOAP engine.
     *
     * The auto-generated RequestClassmap registers anonymous complex types
     * (inline types in the XSD) using their element name (e.g.
     * "informativeMessages"). However, the WSDL reader generates type names
     * by prefixing the parent type name (e.g.
     * "linguisticRequestOutInformativeMessages"). This method registers
     * additional classmaps so both names resolve to the correct PHP class.
     */
    public static function buildEncoderRegistry(): EncoderRegistry
    {
        $ns = 'http://eu.europa.ec.dgt.epoetry';
        $registry = EncoderRegistry::default()
            ->addClassMapCollection(RequestClassmap::types());

        // Map WSDL-reader-generated names for anonymous complex types to
        // their PHP classes. The WSDL reader names these as
        // "{parentType}{ucfirst(elementName)}".
        $anonymousTypeMappings = [
            'requestDetailsInContacts' => Type\Contacts::class,
            'requestDetailsInProducts' => Type\Products::class,
            'originalDocumentInLinguisticSections' => Type\LinguisticSections::class,
            'auxiliaryDocumentsInReferenceDocuments' => Type\ReferenceDocuments::class,
            'auxiliaryDocumentsInTraxDocuments' => Type\TraxDocuments::class,
            'auxiliaryDocumentsInPrtDocuments' => Type\PrtDocuments::class,
            'linguisticRequestOutInformativeMessages' => Type\InformativeMessages::class,
            'requestDetailsOutContacts' => Type\Contacts::class,
            'requestDetailsOutProducts' => Type\Products::class,
            'requestDetailsOutAuxiliaryDocuments' => Type\AuxiliaryDocuments::class,
        ];

        foreach ($anonymousTypeMappings as $typeName => $phpClass) {
            $registry->addClassMap($ns, $typeName, $phpClass);
        }

        return $registry;
    }

    /**
     * {@inheritdoc}
     */
    protected function getEngine(): Engine
    {
        // Override the WSDL port location with the configured endpoint.
        // The v4 engine uses the WSDL port address as the SOAP request
        // target, so we must override it to match the desired environment
        // (acceptance, production, etc.).
        $wsdlLoader = (new LocalWsdlProvider())
            ->withPortLocation('DGTServiceWSPort', $this->endpoint);
        return DefaultEngineFactory::create(
            EngineOptions::defaults(__DIR__ . '/../resources/request.wsdl')
                ->withEncoderRegistry(self::buildEncoderRegistry())
                ->withWsdlLoader(new \Soap\Wsdl\Loader\FlatteningLoader($wsdlLoader))
                ->withTransport($this->transport)
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
