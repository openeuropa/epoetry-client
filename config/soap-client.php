<?php

declare(strict_types = 1);

use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use OpenEuropa\EPoetry\Type\DgtDocument;
use OpenEuropa\EPoetry\Type\DgtDocumentIn;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\CodeGenerator\Rules;
use Zend\Code\Generator\PropertyGenerator;

$filters = [
    'ReceiveNotificationsResponse' => ['return'],
    'LinguisticSections' => ['linguisticSection'],
    'Contacts' => ['contact'],
    'ProductRequests' => ['productRequest'],
    'AuxiliaryDocuments' => ['auxiliaryDocument'],
    'CreateRequestsResponse' => ['return'],
    'CreateRequests' => ['linguisticRequest'],
];

$defaultPropertyAssembler = new Assembler\PropertyAssembler(PropertyGenerator::VISIBILITY_PROTECTED);

$arrayPropertyAssembler = new OpenEuropa\Assembler\ArrayPropertyAssembler(
    (new OpenEuropa\Assembler\ArrayPropertyAssemblerOptions())
        ->filterBy($filters)
);

$nullablePropertyAssembler = new OpenEuropa\Assembler\NullablePropertyAssembler();

$defaultSetterAssembler = new Assembler\FluentSetterAssembler(
    (new Assembler\FluentSetterAssemblerOptions())
        ->withTypeHints()
        ->withReturnType()
);

$arraySetterAssembler = new OpenEuropa\Assembler\ArraySetterAssembler(
    (new OpenEuropa\Assembler\ArraySetterAssemblerOptions())
        ->filterBy($filters)
);

$defaultGetterAssembler = new Assembler\GetterAssembler(
    (new Assembler\GetterAssemblerOptions())
        ->withReturnType()
        ->withBoolGetters()
);

$arrayGetterAssembler = new OpenEuropa\Assembler\ArrayGetterAssembler(
    (new OpenEuropa\Assembler\ArrayGetterAssemblerOptions())
        ->filterBy($filters)
);

$nullableGetterAssembler = new OpenEuropa\Assembler\NullableGetterAssembler();

$fluentAdderAssembler = new OpenEuropa\Assembler\FluentAdderAssembler(
    (new OpenEuropa\Assembler\FluentAdderAssemblerOptions())
        ->filterBy($filters)
);

return Config::create()
    ->setWsdl('resources/dgtServiceWSDL.xml')
    ->setTypeDestination('src/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Type')
    ->setClientDestination('src')
    ->setClientName('EPoetryClient')
    ->setClientNamespace('OpenEuropa\EPoetry')
    ->setClassMapDestination('src')
    ->setClassMapName('EPoetryClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry')
    // We have to do this as the SOAP handler will erroneously create duplicate
    // public properties when a value object extends another one with those
    // same properties marked as "private".
    ->setRuleSet(
        new Rules\RuleSet(
            [
                new Rules\AssembleRule(new Assembler\ClassMapAssembler()),
            ]
        )
    )
    ->addRule(
        new Rules\TypenameMatchesRule(
            new Rules\AssembleRule(new Assembler\ResultAssembler()),
            '/Response$/'
        )
    )
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
            '/(CorrectTranslation|CreateRequests|ReceiveNotifications|Request)$/'
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
    )
    // Set the default property assembler and generate all properties.
    ->addRule(new Rules\AssembleRule($defaultPropertyAssembler))
    // Update properties and set them as 'nullable'
    ->addRule(new Rules\AssembleRule($nullablePropertyAssembler))
    // Update properties and update only some of them.
    ->addRule(new Rules\AssembleRule($arrayPropertyAssembler))
    // Set the default setter assembler and generate all setters methods.
    ->addRule(new Rules\AssembleRule($defaultSetterAssembler))
    // Update setters and update only some of them.
    ->addRule(new Rules\AssembleRule($arraySetterAssembler))
    // Set the default getter assembler and generate all getters methods.
    ->addRule(new Rules\AssembleRule($defaultGetterAssembler))
    // Update getters and set them as 'nullable'
    ->addRule(new Rules\AssembleRule($nullableGetterAssembler))
    // Update getters and update only some of them.
    ->addRule(new Rules\AssembleRule($arrayGetterAssembler))
    // Add adders only on some classes only.
    ->addRule(new Rules\AssembleRule($fluentAdderAssembler));
