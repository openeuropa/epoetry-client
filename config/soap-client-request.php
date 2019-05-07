<?php

declare(strict_types = 1);

use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use OpenEuropa\EPoetry\Request\Type\DgtDocument;
use OpenEuropa\EPoetry\Request\Type\DgtDocumentIn;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapEngineFactory;
use Phpro\SoapClient\Soap\Driver\ExtSoap\ExtSoapOptions;

$specialClassesAndProperties = [
    'ReceiveNotificationsResponse' => ['return'],
    'LinguisticSections' => ['linguisticSection'],
    'Contacts' => ['contact'],
    'ProductRequests' => ['productRequest'],
    'AuxiliaryDocuments' => ['auxiliaryDocument'],
    'CreateRequestsResponse' => ['return'],
    'CreateRequests' => ['linguisticRequest'],
];

return OpenEuropa\ConfigFactory::create($specialClassesAndProperties)
    ->setEngine(ExtSoapEngineFactory::fromOptions(
        ExtSoapOptions::defaults('resources/dgtServiceWSDL.xml', [])
            ->disableWsdlCache()
    ))
    ->setTypeDestination('src/Request/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Request\Type')
    ->setClientDestination('src')
    ->setClientName('RequestClient')
    ->setClientNamespace('OpenEuropa\EPoetry\Request')
    ->setClassMapDestination('src/Request')
    ->setClassMapName('RequestClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Request')
// Generate SOAP request classes.
//
// Request objects must implement \Phpro\SoapClient\Type\RequestInterface
// The rule matches the following SOAP types:
//
// - correctTranslation
// - createRequests
// - findLinguisticRequest
// - getLinguisticRequest
// - modifyRequest
// - receiveNotifications
    ->addRule(
        new Rules\TypenameMatchesRule(
            new Rules\AssembleRule(new Assembler\RequestAssembler()),
            '/(CorrectTranslation|CreateRequests|ReceiveNotifications|LinguisticRequest|ModifyRequest)$/'
        )
    )
    ->addRule(
        new Rules\TypenameMatchesRule(
            new Rules\AssembleRule(new Assembler\ExtendAssembler(DgtDocument::class)),
            '/^(Auxiliary|Correction|Original)Document$/'
        )
    )
    ->addRule(
        new Rules\TypenameMatchesRule(
            new Rules\AssembleRule(new Assembler\ExtendAssembler(DgtDocumentIn::class)),
            '/^(Auxiliary|Original)DocumentIn$/'
        )
    );
