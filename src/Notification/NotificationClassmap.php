<?php

namespace OpenEuropa\EPoetry\Notification;

use Soap\Encoding\ClassMap\ClassMapCollection;
use Soap\Encoding\ClassMap\ClassMap;

class NotificationClassmap
{
    public static function types(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'receiveNotification', \OpenEuropa\EPoetry\Notification\Type\ReceiveNotification::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'receiveNotificationResponse', \OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticRequest', \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dgtNotificationResult', \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dgtNotification', \OpenEuropa\EPoetry\Notification\Type\DgtNotification::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'productReference', \OpenEuropa\EPoetry\Notification\Type\ProductReference::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestReference', \OpenEuropa\EPoetry\Notification\Type\RequestReference::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'product', \OpenEuropa\EPoetry\Notification\Type\Product::class),
        );
    }

    public static function enums(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
        );
    }
}
