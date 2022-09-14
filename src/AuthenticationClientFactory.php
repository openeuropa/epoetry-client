<?php

namespace OpenEuropa\EPoetry;

use Http\Client\Common\PluginClient;
use Http\Discovery\Psr18ClientDiscovery;
use OpenEuropa\EPoetry\Authentication\AuthenticationClassmap;
use OpenEuropa\EPoetry\Authentication\AuthenticationClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\Psr18Transport\Psr18Transport;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpClient\CurlHttpClient;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpClient\Psr18Client;
use function Symfony\Component\DependencyInjection\Loader\Configurator\env;

class AuthenticationClientFactory
{
    public static function factory() : \OpenEuropa\EPoetry\Authentication\AuthenticationClient
    {
        $httpClient = new CurlHttpClient([
            'verify_peer' => false,
            'verify_host' => false,
            'local_cert' => __DIR__.'/../certs/j905dyi.p12',
            'passphrase' => 'password',
        ]);

        $client = new Psr18Client($httpClient);
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults(__DIR__.'/../resources/authentication.wsdl', [])
                ->withClassMap(AuthenticationClassmap::getCollection()),
            Psr18Transport::createForClient(new PluginClient($client))
        );

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new AuthenticationClient($caller);
    }
}

