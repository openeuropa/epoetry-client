<?php

namespace OpenEuropa\EPoetry\Request;

use OpenEuropa\EPoetry\Request\RequestClient;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class RequestClientFactory
{
    public static function factory(string $wsdl) : \OpenEuropa\EPoetry\Request\RequestClient
    {
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(RequestClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new RequestClient($caller);
    }
}

