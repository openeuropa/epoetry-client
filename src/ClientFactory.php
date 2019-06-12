<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\NotificationClient;
use OpenEuropa\EPoetry\Notification\NotificationServer;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use OpenEuropa\EPoetry\Services\LoggerDecorator;
use OpenEuropa\EPoetry\Services\LoggerSubscriber;
use Phpro\SoapClient\ClientInterface;
use Phpro\SoapClient\Middleware\MiddlewareInterface;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapDriver;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapEngineFactory;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptionsResolverFactory;
use Phpro\SoapClient\Soap\Engine\DriverInterface;
use Phpro\SoapClient\Soap\Engine\Engine;
use Phpro\SoapClient\Soap\Handler\HttPlugHandle;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Factory class for the ePoetry client.
 *
 * It can be used to get both Request and Notification clients.
 */
class ClientFactory extends AbstractFactory
{
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
     * Build the driver for engine.
     *
     * @return DriverInterface
     */
    public function buildDriver()
    {
        $options = ExtSoapOptions::defaults($this->buildWsdl(), [])
            ->withClassMap($this->mapCollection);

        return ExtSoapDriver::createFromOptions($options);
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
     * Get a notification client instance.
     *
     * @return NotificationClient
     */
    public function getNotificationClient(): ClientInterface
    {
        $this->setNotificationData();

        return $this->buildClient(NotificationClient::class);
    }

    /**
     * Get a request client instance.
     *
     * @return RequestClient
     */
    public function getRequestClient(): ClientInterface
    {
        $this->setRequestData();

        return $this->buildClient(RequestClient::class);
    }

    /**
     * @return NotificationServer
     */
    public function getSoapServer(): NotificationServer
    {
        $this->setNotificationData();
        $options = ExtSoapOptionsResolverFactory::create()->resolve([
            'classmap' => NotificationClassmap::getCollection(),
        ]);

        return new NotificationServer($this->buildWsdl(), $options);
    }

    /**
     * Set event dispatcher instance.
     *
     * Pass here an external application event dispatcher to be able to
     * subscribe to ePoetry events via the application's preferred methods.
     *
     * @param EventDispatcherInterface $eventDispatcher
     *    Event dispatcher instance
     *
     * @return $this
     */
    public function setEventDispatcher(EventDispatcherInterface $eventDispatcher): ClientFactory
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
     * @param LoggerInterface $logger
     *    PSR3-compatible logger instance
     *
     * @return $this
     */
    public function setLogger(LoggerInterface $logger): ClientFactory
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
     * @return $this
     */
    public function setLogLevel(string $logLevel): ClientFactory
    {
        $this->logLevel = $logLevel;

        return $this;
    }

    /**
     * Set request data for client.
     *
     * @return $this
     */
    public function setRequestData()
    {
        $this->wsdlFile = 'dgtServiceWSDL.xml';
        $this->xsdFile = 'dgtServiceXSD.xml';
        $this->mapCollection = RequestClassmap::getCollection();

        return $this;
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
