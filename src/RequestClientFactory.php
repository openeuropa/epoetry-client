<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use OpenEuropa\EPoetry\Request\RequestClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\Engine\Engine;
use Soap\ExtSoapEngine\ExtSoapOptions;

/**
 * Request client factory.
 */
class RequestClientFactory extends BaseClientFactory
{
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
     * Gets request client.
     *
     * @return RequestClient
     *   RequestClient instance.
     */
    public function getRequestClient(): RequestClient
    {
        $this->addValidatior(__DIR__ . '/../config/validator/request.yaml');

        // Set logger, if any.
        if ($this->logger) {
            $this->addLogger($this->logger);
        }

        // Build caller.
        $caller = new EventDispatchingCaller(new EngineCaller($this->getEngine()), $this->eventDispatcher);

        // Build request client.
        return new RequestClient($caller);
    }

}
