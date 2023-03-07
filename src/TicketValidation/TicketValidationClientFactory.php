<?php

namespace OpenEuropa\EPoetry\TicketValidation;

use OpenEuropa\EPoetry\TicketValidation\TicketValidationClient;
use OpenEuropa\EPoetry\TicketValidation\TicketValidationClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class TicketValidationClientFactory
{
    public static function factory(string $wsdl) : \OpenEuropa\EPoetry\TicketValidation\TicketValidationClient
    {
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(TicketValidationClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new TicketValidationClient($caller);
    }
}

