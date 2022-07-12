<?php

use OpenEuropa\EPoetry\CodeGenerator\ConfigProcessor;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Soap\DefaultEngineFactory;

$config = Config::create()
    ->setEngine($engine = DefaultEngineFactory::create(
        ExtSoapOptions::defaults('./resources/request.wsdl', [])
            ->disableWsdlCache()
    ))
    ->setTypeDestination('src/Request/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Request\Type')
    ->setClientDestination('src/Request/')
    ->setClientName('RequestClient')
    ->setClientNamespace('OpenEuropa\EPoetry\Request')
    ->setClassMapDestination('src/Request')
    ->setClassMapName('RequestClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Request');

return ConfigProcessor::addRules($config);
