<?php

use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\Soap\CodeGeneratorEngineFactory;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\CodeGenerator\Assembler;
use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;

$engine = CodeGeneratorEngineFactory::create('./resources/notification.wsdl');
return Config::create()
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
            )
        ),
        new Rules\AssembleRule(new Assembler\FluentSetterAssembler(
                Assembler\FluentSetterAssemblerOptions::create()
                    ->withTypeHints()
            )
        ),
        new Rules\AssembleRule(new Assembler\GetterAssembler(
                Assembler\GetterAssemblerOptions::create()
                    ->withReturnType()
                    ->withBoolGetters()
            )
        ),
        new Rules\AssembleRule(new OpenEuropa\Assembler\HasPropertyAssembler()),
        new Rules\AssembleRule(new Assembler\ClassMapAssembler()),
        new Rules\AssembleRule(new Assembler\ClientConstructorAssembler()),
        new Rules\AssembleRule(new Assembler\ClientMethodAssembler()),
    ]));
