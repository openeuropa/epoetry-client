<?php

namespace OpenEuropa\EPoetryNotification;

use OpenEuropa\EPoetry\Notification\EPoetryNotificationClassmap;
use Phpro\SoapClient\ClientFactory as PhproClientFactory;
use Phpro\SoapClient\ClientBuilder;

class EPoetryNotificationClientFactory
{

    public static function factory(string $wsdl) : \OpenEuropa\EPoetryNotification\EPoetryNotificationClient
    {
        $clientFactory = new PhproClientFactory(EPoetryNotificationClient::class);
        $clientBuilder = new ClientBuilder($clientFactory, $wsdl, []);
        $clientBuilder->withClassMaps(EPoetryNotificationClassmap::getCollection());

        return $clientBuilder->build();
    }


}

