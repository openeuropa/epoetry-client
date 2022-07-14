<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\Engine\Engine;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Soap\ExtSoapEngine\Wsdl\WsdlProvider;

class BaseClientFactory
{

    protected function buildEngine(string $wsdlFilepath, WsdlProvider $wsdlProvider): Engine
    {
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults($wsdlFilepath, [])
                ->withClassMap(RequestClassmap::getCollection())
                ->withWsdlProvider($wsdlProvider)
        );
        return $engine;
    }
}
