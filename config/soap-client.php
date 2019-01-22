<?php

use Phpro\SoapClient\CodeGenerator\Assembler;
use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
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
            ->withProperties([
                'Contacts' => ['contact'],
            ])
    )))
;
