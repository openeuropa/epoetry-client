<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\EPoetryClient;
use OpenEuropa\EPoetry\EPoetryClassmap;
use Phpro\SoapClient\ClientFactory as PhproClientFactory;
use Phpro\SoapClient\ClientBuilder;

class EPoetryClientFactory
{
    public static function factory(string $wsdl) : \OpenEuropa\EPoetry\EPoetryClient
    {
        $clientFactory = new PhproClientFactory(EPoetryClient::class);
        $clientBuilder = new ClientBuilder($clientFactory, $wsdl, []);
        $clientBuilder->withClassMaps(EPoetryClassmap::getCollection());

        return $clientBuilder->build();
    }
}
