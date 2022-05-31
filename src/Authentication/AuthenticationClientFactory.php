<?php

namespace OpenEuropa\EPoetry\Authentication;

use OpenEuropa\EPoetry\Authentication\AuthenticationClient;
use OpenEuropa\EPoetry\Authentication\AuthenticationClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class AuthenticationClientFactory
{
    public static function factory(string $wsdl) : \OpenEuropa\EPoetry\Authentication\AuthenticationClient
    {
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(AuthenticationClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new AuthenticationClient($caller);
    }
}

