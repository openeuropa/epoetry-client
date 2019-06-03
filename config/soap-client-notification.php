<?php

declare(strict_types = 1);

use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapEngineFactory;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;

$specialClassesAndProperties = [
    'ProductRequests' => ['productRequest'],
];
$overridePropertyTypes = [
    'ProductReference' => [
        'targetLanguage' => 'Language',
    ],
    'ProductRequest' => [
        'language' => 'Language',
    ],
];

return OpenEuropa\ConfigFactory::create($specialClassesAndProperties, $overridePropertyTypes)
    ->setEngine(ExtSoapEngineFactory::fromOptions(
        ExtSoapOptions::defaults('resources/NotificationServiceWSDL.xml', [])
            ->disableWsdlCache()
    ))
    ->setTypeDestination('src/Notification/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Notification\Type')
    ->setClientDestination('src/Notification/')
    ->setClientName('NotificationClient')
    ->setClientNamespace('OpenEuropa\Notification')
    ->setClassMapDestination('src/Notification/')
    ->setClassMapName('NotificationClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Notification')
// Generate SOAP request classes.
//
// Request objects must implement \Phpro\SoapClient\Type\RequestInterface
// The rule matches the following SOAP types:
//
// - receiveNotification
    ->addRule(
        new Rules\TypenameMatchesRule(
            new Rules\AssembleRule(new Assembler\RequestAssembler()),
            '/(ReceiveNotification)$/'
        )
    );
