<?php

use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Phpro\SoapClient\Soap\EngineOptions;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\CodeGenerator\Assembler;
use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use OpenEuropa\EPoetry\CodeGenerator\Metadata\SuppressEnumGenerationManipulator;
use Phpro\SoapClient\Soap\Metadata\Manipulators\TypesManipulatorChain;
use Phpro\SoapClient\Soap\Metadata\MetadataOptions;

$engine = DefaultEngineFactory::create(
    EngineOptions::defaults(__DIR__ . '/../resources/notification.wsdl')
);
$config = Config::create()
    ->setEngine($engine)
    ->setTypeDestination('src/Notification/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Notification\Type')
    ->setClientDestination('src/Notification/')
    ->setClientNamespace('OpenEuropa\EPoetry\Notification')
    ->setClassMapDestination('src/Notification/')
    ->setClassMapName('NotificationClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Notification')
    ->setRuleSet(new Rules\RuleSet([
        new Rules\AssembleRule(new Assembler\PropertyAssembler(
            Assembler\PropertyAssemblerOptions::create()
                    ->withTypeHints(false)
        )),
        new Rules\AssembleRule(new Assembler\FluentSetterAssembler(
            Assembler\FluentSetterAssemblerOptions::create()
                    ->withTypeHints()
        )),
        new Rules\AssembleRule(new Assembler\GetterAssembler(
            Assembler\GetterAssemblerOptions::create()
                ->withReturnType()
                ->withBoolGetters()
        )),
        new Rules\AssembleRule(new OpenEuropa\Assembler\HasPropertyAssembler()),
        new Rules\AssembleRule(new Assembler\ClassMapAssembler()),
        new Rules\AssembleRule(new Assembler\ClientConstructorAssembler()),
        new Rules\AssembleRule(new Assembler\ClientMethodAssembler()),
    ]));

// Suppress PHP enum generation for XSD enumerations to preserve
// the string-based public API used by the NotificationHandler.
$config->setMetadataOptions(
    MetadataOptions::empty()
        ->withTypesManipulator(
            new TypesManipulatorChain(
                new SuppressEnumGenerationManipulator(),
            )
        )
);

return $config;
