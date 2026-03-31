<?php

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Notification\Type;
use Soap\Encoding\ClassMap\ClassMapCollection;
use Soap\Encoding\ClassMap\ClassMap;

class NotificationClassmap
{
    public static function types(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'receiveNotification', Type\ReceiveNotification::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'receiveNotificationResponse', Type\ReceiveNotificationResponse::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'linguisticRequest', Type\LinguisticRequest::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dgtNotificationResult', Type\DgtNotificationResult::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'dgtNotification', Type\DgtNotification::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'productReference', Type\ProductReference::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'requestReference', Type\RequestReference::class),
            new ClassMap('http://eu.europa.ec.dgt.epoetry', 'product', Type\Product::class),
        );
    }

    public static function enums(): \Soap\Encoding\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(

        );
    }
}

