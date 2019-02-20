<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification;

use Phpro\SoapClient\ClientFactory as PhproClientFactory;
use Phpro\SoapClient\ClientBuilder;

class EPoetryNotificationClientFactory
{
    public static function factory(string $wsdl): EPoetryNotificationClient
    {
        $clientFactory = new PhproClientFactory(EPoetryNotificationClient::class);
        $clientBuilder = new ClientBuilder($clientFactory, $wsdl, []);
        $clientBuilder->withClassMaps(EPoetryNotificationClassmap::getCollection());

        return $clientBuilder->build();
    }
}
