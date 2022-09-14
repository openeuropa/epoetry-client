<?php

use OpenEuropa\EPoetry\CodeGenerator\ConfigProcessor;
use OpenEuropa\EPoetry\Request\Type\ContactPersonIn;
use OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut;
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

$config = ConfigProcessor::addRules($config, [
    'LinguisticSections' => ['linguisticSection'],
    'Contacts' => ['contact'],
    'Products' => ['product'],
    'AuxiliaryDocuments' => ['document'],
    'ReferenceDocuments' => ['document'],
    'TraxDocuments' => ['document'],
    'PrtDocuments' => ['document'],
    'InformativeMessages' => ['message']
    //    'ReceiveNotificationsResponse' => ['return'],
    //    'CreateRequestsResponse' => ['return'],
    //    'CreateRequests' => ['linguisticRequest'],
    //    'ProductRequests' => ['productRequest'],
]);
$config = ConfigProcessor::addConstructorRule($config, [
    'ContactPersonIn',
    'ContactPersonOut',
    'LinguisticSectionOut',
    'LinguisticSectionIn'
]);

return $config;
