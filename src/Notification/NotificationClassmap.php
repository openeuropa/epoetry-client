<?php

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Notification\Type;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMapCollection;
use Soap\ExtSoapEngine\Configuration\ClassMap\ClassMap;

class NotificationClassmap
{
    public static function getCollection() : \Soap\ExtSoapEngine\Configuration\ClassMap\ClassMapCollection
    {
        return new ClassMapCollection(
            new ClassMap('receiveNotification', Type\ReceiveNotification::class),
            new ClassMap('receiveNotificationResponse', Type\ReceiveNotificationResponse::class),
            new ClassMap('linguisticRequest', Type\LinguisticRequest::class),
            new ClassMap('dgtNotificationResult', Type\DgtNotificationResult::class),
            new ClassMap('dgtNotification', Type\DgtNotification::class),
            new ClassMap('productReference', Type\ProductReference::class),
            new ClassMap('requestReference', Type\RequestReference::class),
            new ClassMap('product', Type\Product::class),
        );
    }
}

