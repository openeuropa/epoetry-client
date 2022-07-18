<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\Engine\Engine;
use Soap\Engine\Transport;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\ExtSoapEngine\Wsdl\WsdlProvider;

class BaseClientFactory
{

    protected static function buildEngine(string $wsdlFilepath, WsdlProvider $wsdlProvider, Transport $transport): Engine
    {
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults($wsdlFilepath, [])
                ->withClassMap(RequestClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
                ->disableWsdlCache(),
            $transport
        );

        return $engine;
    }
}
