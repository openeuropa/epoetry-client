<?php

use OpenEuropa\EPoetry\CodeGenerator\ConfigProcessor;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\Soap\CodeGeneratorEngineFactory;

$engine = CodeGeneratorEngineFactory::create('./resources/request.wsdl');
$config = Config::create()
    ->setEngine($engine)
    ->setTypeDestination('src/Request/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Request\Type')
    ->setClientDestination('src/Request/')
    ->setClientName('RequestClient')
    ->setClientNamespace('OpenEuropa\EPoetry\Request')
    ->setClassMapDestination('src/Request')
    ->setClassMapName('RequestClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Request');

ConfigProcessor::addRules($config, [
    'LinguisticSections' => ['linguisticSection'],
    'Contacts' => ['contact'],
    'Products' => ['product'],
    'AuxiliaryDocuments' => ['document'],
    'ReferenceDocuments' => ['document'],
    'TraxDocuments' => ['document'],
    'PrtDocuments' => ['document'],
    'InformativeMessages' => ['message']
]);
ConfigProcessor::addConstructorRule($config, [
    'ContactPersonIn',
    'ContactPersonOut',
    'LinguisticSectionOut',
    'LinguisticSectionIn'
]);

return $config;
