<?php

use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Soap\DefaultEngineFactory;

// Generate SOAP client library to perform EU Login ticket validation.
// @link https://citnet.tech.ec.europa.eu/CITnet/confluence/display/IAM/EU+Login+Endpoints#EULoginEndpoints-CASTicketValidationWSDL
// WSDL used for generating the SOAP codebase can be found here:
// @link https://ecas.ec.europa.eu/cas/ws/TicketValidationService?WSDL
// The content returned by the URL above is stored locally in resources/ticket-validation.wsdl.
return Config::create()
    ->setEngine($engine = DefaultEngineFactory::create(
        ExtSoapOptions::defaults(__DIR__.'/../resources/ticket-validation.wsdl', [])
            ->disableWsdlCache()
    ))
    ->setTypeDestination('src/TicketValidation/EuLogin/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\TicketValidation\EuLogin\Type')
    ->setClientDestination('src/TicketValidation/EuLogin')
    ->setClientName('EuLoginTicketValidationClient')
    ->setClientNamespace('OpenEuropa\EPoetry\TicketValidation\EuLogin')
    ->setClassMapDestination('src/TicketValidation/EuLogin')
    ->setClassMapName('EuLoginTicketValidationClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\TicketValidation\EuLogin')
    ->addRule(new Rules\AssembleRule(new Assembler\GetterAssembler(new Assembler\GetterAssemblerOptions())))
    ->addRule(new Rules\AssembleRule(new Assembler\ImmutableSetterAssembler(
        new Assembler\ImmutableSetterAssemblerOptions()
    )))
    ->addRule(
        new Rules\IsRequestRule(
            $engine->getMetadata(),
            new Rules\MultiRule([
                new Rules\AssembleRule(new Assembler\RequestAssembler()),
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
