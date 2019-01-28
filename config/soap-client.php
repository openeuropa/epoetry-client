<?php

declare(strict_types = 1);

use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\CodeGenerator\Rules;
use Zend\Code\Generator\PropertyGenerator;

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
    // Set all property visibility to "protected".
    //
    // We have to do this as the SOAP handler will erroneously create duplicate
    // public properties when a value object extends another one with those
    // same properties marked as "private".
    ->setRuleSet(
        new Rules\RuleSet(
            [
                new Rules\AssembleRule(new Assembler\PropertyAssembler(PropertyGenerator::VISIBILITY_PROTECTED)),
                new Rules\AssembleRule(new Assembler\ClassMapAssembler()),
            ]
        )
    )
    ->addRule(new Rules\AssembleRule(new OpenEuropa\Assembler\NullableGetterAssembler(
        (new Assembler\GetterAssemblerOptions())
            ->withReturnType()
            ->withBoolGetters()
    )))
    ->addRule(new Rules\AssembleRule(new Assembler\SetterAssembler(
        (new Assembler\SetterAssemblerOptions())
            ->withTypeHints()
    )))
    ->addRule(new Rules\AssembleRule(new Assembler\FluentSetterAssembler(
        (new Assembler\FluentSetterAssemblerOptions())
            ->withTypeHints()
            ->withReturnType()
    )))
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
            new Rules\AssembleRule(new Assembler\ExtendAssembler('\OpenEuropa\EPoetry\Type\DgtDocument')),
            '/^(Auxiliary|Correction|Original)Document$/'
        )
    )
    ->addRule(
        new Rules\TypenameMatchesRule(
            new Rules\AssembleRule(new Assembler\ExtendAssembler('\OpenEuropa\EPoetry\Type\DgtDocumentIn')),
            '/^(Auxiliary|Original)DocumentIn$/'
        )
    )
    ->addRule(new Rules\AssembleRule(new OpenEuropa\Assembler\FluentAdderAssembler(
        (new OpenEuropa\Assembler\FluentAdderAssemblerOptions())
            ->withTypeHints()
            ->withReturnType()
            ->generateAdderForProperty('ReceiveNotificationsResponse', 'return')
            ->generateAdderForProperty('LinguisticSections', 'linguisticSection')
            ->generateAdderForProperty('Contacts', 'contact')
            ->generateAdderForProperty('ProductRequests', 'productRequest')
            ->generateAdderForProperty('AuxiliaryDocuments', 'auxiliaryDocument')
            ->generateAdderForProperty('CreateRequestsResponse', 'return')
            ->generateAdderForProperty('CreateRequests', 'linguisticRequest')
    )));
