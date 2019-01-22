<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry;

use Phpro\SoapClient\ClientBuilder;
use Phpro\SoapClient\ClientFactory as PhproClientFactory;

class EPoetryClientFactory
{
    public static function factory(string $wsdl): EPoetryClient
    {
        $clientFactory = new PhproClientFactory(EPoetryClient::class);
        $clientBuilder = new ClientBuilder($clientFactory, $wsdl, []);
        $clientBuilder->withClassMaps(EPoetryClassmap::getCollection());

        return $clientBuilder->build();
    }
}
