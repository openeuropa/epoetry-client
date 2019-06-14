<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

use Http\Client\HttpClient;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use OpenEuropa\EPoetry\Services\LoggerDecorator;
use OpenEuropa\EPoetry\Services\LoggerSubscriber;
use Phpro\SoapClient\ClientInterface;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapEngineFactory;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;
use Phpro\SoapClient\Soap\Engine\Engine;
use Phpro\SoapClient\Soap\Handler\HttPlugHandle;
use Symfony\Component\EventDispatcher\EventDispatcher;

/**
 * Factory class for the ePoetry client.
 *
 * It can be used to get both Request and Notification clients.
 */
class ClientFactory extends AbstractFactory
{
    /**
     * {@inheritdoc}
     */
    protected $wsdlFile = 'dgtServiceWSDL.xml';

    /**
     * {@inheritdoc}
     */
    protected $xsdFile = 'dgtServiceXSD.xml';

    /**
     * {@inheritdoc}
     */
    public function __construct($endpoint, HttpClient $httpClient, array $soapOptions = [])
    {
        parent::__construct($endpoint, $httpClient, $soapOptions);

        $this->mapCollection = RequestClassmap::getCollection();
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
     * Build the WSDL with file on resources.
     *
     * @return string
     */
    public function buildWsdl(): string
    {
        $wsdl = file_get_contents(__DIR__ . '/../resources/' . $this->wsdlFile);
        $wsdl = str_replace('%ENDPOINT%', $this->endpoint, $wsdl);

        $xsd = file_get_contents(__DIR__ . '/../resources/' . $this->xsdFile);
        $wsdl = str_replace($this->xsdFile, 'plain;base64,' . base64_encode($xsd), $wsdl);

        return 'data://text/plain;base64,' . base64_encode($wsdl);
    }

    /**
     * Get a request client instance.
     *
     * @return RequestClient
     */
    public function getRequestClient(): ClientInterface
    {
        return $this->buildClient(RequestClient::class);
    }

    /**
     * Build and return an ePoetry client instance.
     *
     * Make sure you set/add logger, event dispatcher and middlewares before
     * calling this method.
     *
     * @param string $clientName
     *    Client class name.
     *
     * @return ClientInterface
     *    Client instance.
     */
    protected function buildClient(string $clientName): ClientInterface
    {
        $engine = $this->buildEngine();

        $this->eventDispatcher = $this->eventDispatcher ?? new EventDispatcher();
        if ($this->logger) {
            $logger = new LoggerDecorator($this->logger, $this->logLevel);
            $logPlugin = new LoggerSubscriber($logger);
            $this->eventDispatcher->addSubscriber($logPlugin);
        }

        return new $clientName($engine, $this->eventDispatcher);
    }

    /**
     * Build the engine for client.
     *
     * @return Engine
     */
    protected function buildEngine()
    {
        $wsdl = $this->buildWsdl();

        $handler = HttPlugHandle::createForClient($this->httpClient);
        if ($this->middlewares) {
            foreach ($this->middlewares as $middleware) {
                $handler->addMiddleware($middleware);
            }
        }

        return ExtSoapEngineFactory::fromOptionsWithHandler(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap($this->mapCollection),
            $handler
        );
    }
}
