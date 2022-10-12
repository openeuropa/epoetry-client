<?php

use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Soap\ExtSoapEngine\ExtSoapOptions;
use Phpro\SoapClient\Soap\DefaultEngineFactory;

// Generate SOAP client library to perform ECAS client certificate login.
// @link https://citnet.tech.ec.europa.eu/CITnet/confluence/display/IAM/ECAS+Certificate+Login
// WSDL used for generating the SOAP codebase can be found here:
// @link https://webgate.ec.europa.eu/cas/ws/CertLoginService.wsdl
// The content returned by the URL above is stored locally in resources/authentication.wsdl.
return Config::create()
    ->setEngine($engine = DefaultEngineFactory::create(
        ExtSoapOptions::defaults(__DIR__.'/../resources/authentication.wsdl', [])
            ->disableWsdlCache()
    ))
    ->setTypeDestination('src/Authentication/ClientCertificate/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Authentication\ClientCertificate\Type')
    ->setClientDestination('src/Authentication/ClientCertificate')
    ->setClientName('ClientCertificateClient')
    ->setClientNamespace('OpenEuropa\EPoetry\Authentication\ClientCertificate')
    ->setClassMapDestination('src/Authentication/ClientCertificate')
    ->setClassMapName('ClientCertificateClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Authentication\ClientCertificate')
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
