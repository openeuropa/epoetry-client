<?php

use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\CodeGenerator\Config\ClassMapConfig;
use Phpro\SoapClient\CodeGenerator\Config\ClientConfig;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\CodeGenerator\Config\Destination;
use Phpro\SoapClient\CodeGenerator\Config\TypeNamespaceMap;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Phpro\SoapClient\Soap\EngineOptions;

// Generate SOAP client library to perform ECAS client certificate login.
// @link https://citnet.tech.ec.europa.eu/CITnet/confluence/display/IAM/ECAS+Certificate+Login
// WSDL used for generating the SOAP codebase can be found here:
// @link https://webgate.ec.europa.eu/cas/ws/CertLoginService.wsdl
// The content returned by the URL above is stored locally in resources/authentication.wsdl.
$engine = DefaultEngineFactory::create(
    EngineOptions::defaults(__DIR__ . '/../resources/authentication.wsdl')
);
return Config::create()
    ->setEngine($engine)
    ->setTypeNamespaceMap(
        TypeNamespaceMap::create(new Destination('src/Authentication/ClientCertificate/Type', 'OpenEuropa\EPoetry\Authentication\ClientCertificate\Type'))
    )
    ->setClient(new ClientConfig('ClientCertificateClient', new Destination('src/Authentication/ClientCertificate', 'OpenEuropa\EPoetry\Authentication\ClientCertificate')))
    ->setClassMap(new ClassMapConfig('ClientCertificateClassmap', new Destination('src/Authentication/ClientCertificate', 'OpenEuropa\EPoetry\Authentication\ClientCertificate')))
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
