<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClient;
use Phpro\SoapClient\Caller\EngineCaller;
use Phpro\SoapClient\Caller\EventDispatchingCaller;
use Symfony\Component\EventDispatcher\EventDispatcher;

class RequestClientFactory extends BaseClientFactory
{
    public static function factory(string $endpoint): RequestClient
    {
        $wsdlProvider = (new LocalWsdlProvider())
            ->withPortLocation('DGTServiceWSPort', $endpoint);
        $wsdl = __DIR__.'/../resources/request.wsdl';
        $engine = self::buildEngine($wsdl, $wsdlProvider);

        $eventDispatcher = new EventDispatcher();
        $caller = new EventDispatchingCaller(new EngineCaller($engine), $eventDispatcher);

        return new RequestClient($caller);
    }
}
