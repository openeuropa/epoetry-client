<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use OpenEuropa\EPoetry\Notification\NotificationClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Symfony\Component\EventDispatcher\EventDispatcher;

class NotificationClientFactory extends BaseClientFactory
{
    public static function factory(string $wsdl): NotificationClient
    {
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults($wsdl, [])
                ->withClassMap(NotificationClassmap::getCollection())
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new NotificationClient($caller);
    }
}

