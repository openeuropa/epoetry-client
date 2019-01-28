<?php

declare(strict_types = 1);

use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\CodeGenerator\Rules;

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
    ->addRule(new Rules\AssembleRule(new Assembler\GetterAssembler(
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
