<?php

use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\CodeGenerator\Config\Config;

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
    ->addRule(new Rules\AssembleRule(new Assembler\ConstructorAssembler(
        (new Assembler\ConstructorAssemblerOptions())
            ->withTypeHints()
            ->withDocBlocks()
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
    ->addRule(
        new Rules\TypenameMatchesRule(
            new Rules\AssembleRule(new Assembler\RequestAssembler()),
            '/Request$/'
        )
    )
;
