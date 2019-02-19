<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification;

use Phpro\SoapClient\Soap\ClassMap\ClassMap;
use Phpro\SoapClient\Soap\ClassMap\ClassMapCollection;

class EPoetryNotificationClassmap
{

    public static function getCollection(): ClassMapCollection
    {
        return new ClassMapCollection([
            new ClassMap('receiveNotification', Type\ReceiveNotification::class),
            new ClassMap('productRequest', Type\ProductRequest::class),
            new ClassMap('requestReference', Type\RequestReference::class),
            new ClassMap('productReference', Type\ProductReference::class),
            new ClassMap('DGTNotificationException', Type\DGTNotificationException::class),
            new ClassMap('dgtNotification', Type\DgtNotification::class),
            new ClassMap('productRequests', Type\ProductRequests::class),
            new ClassMap('language', Type\Language::class),
            new ClassMap('receiveNotificationResponse', Type\ReceiveNotificationResponse::class),
        ]);
    }


}

