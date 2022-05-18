<?php

namespace OpenEuropa\Notification;

use OpenEuropa\Notification\NotificationClient;
use OpenEuropa\EPoetry\Notification\NotificationClassmap;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Caller\EngineCaller;

class NotificationClientFactory
{
    public static function factory(string $wsdl) : \OpenEuropa\Notification\NotificationClient
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

