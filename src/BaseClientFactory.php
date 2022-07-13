<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\ExtSoapEngine\LocalWsdlProvider;
use OpenEuropa\EPoetry\Request\RequestClassmap;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Soap\Engine\Engine;
use Soap\ExtSoapEngine\ExtSoapOptions;

class BaseClientFactory {

    protected function buildEngine(string $endpoint, string $wsdlFilepath): Engine {
        $engine = DefaultEngineFactory::create(
            ExtSoapOptions::defaults($wsdlFilepath, [])
                ->withClassMap(RequestClassmap::getCollection())
                ->withWsdlProvider(new LocalWsdlProvider($wsdlFilepath, [
                    '${endpoint}' => $endpoint,
                ]))
        );
        return $engine;
    }
}
