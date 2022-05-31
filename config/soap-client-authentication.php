<?php

use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Soap\DefaultEngineFactory;

return Config::create()
    ->setEngine($engine = DefaultEngineFactory::create(
        ExtSoapOptions::defaults('https://webgate.ec.europa.eu/cas/ws/CertLoginService.wsdl', [])
            ->disableWsdlCache()
    ))
    ->setTypeDestination('src/Authentication/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Authentication\Type')
    ->setClientDestination('src/Authentication')
    ->setClientName('AuthenticationClient')
    ->setClientNamespace('OpenEuropa\EPoetry\Authentication')
    ->setClassMapDestination('src/Authentication')
    ->setClassMapName('AuthenticationClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Authentication')
    ->addRule(new Rules\AssembleRule(new Assembler\GetterAssembler(new Assembler\GetterAssemblerOptions())))
    ->addRule(new Rules\AssembleRule(new Assembler\ImmutableSetterAssembler(
        new Assembler\ImmutableSetterAssemblerOptions()
    )))
    ->addRule(
        new Rules\IsRequestRule(
            $engine->getMetadata(),
            new Rules\MultiRule([
                new Rules\AssembleRule(new Assembler\RequestAssembler()),
                new Rules\AssembleRule(new Assembler\ConstructorAssembler(new Assembler\ConstructorAssemblerOptions())),
            ])
        )
    )
    ->addRule(
        new Rules\IsResultRule(
            $engine->getMetadata(),
            new Rules\MultiRule([
                new Rules\AssembleRule(new Assembler\ResultAssembler()),
            ])
        )
    )
;
