<?php

use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\Soap\CodeGeneratorEngineFactory;
use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;

$engine = CodeGeneratorEngineFactory::create('./resources/request.wsdl');
$config = Config::create()
    ->setEngine($engine)
    ->setTypeDestination('src/Request/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Request\Type')
    ->setClientDestination('src/Request/')
    ->setClientName('RequestClient')
    ->setClientNamespace('OpenEuropa\EPoetry\Request')
    ->setClassMapDestination('src/Request')
    ->setClassMapName('RequestClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Request');

$specialClassesAndProperties = [
    'LinguisticSections' => ['linguisticSection'],
    'Contacts' => ['contact'],
    'Products' => ['product'],
    'AuxiliaryDocuments' => ['document'],
    'ReferenceDocuments' => ['document'],
    'TraxDocuments' => ['document'],
    'PrtDocuments' => ['document'],
    'InformativeMessages' => ['message']
];

$rules = [
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
    new Rules\AssembleRule(
        new OpenEuropa\Assembler\FluentAdderAssembler(
            (new OpenEuropa\Assembler\FluentAdderAssemblerOptions())
                ->whitelist($specialClassesAndProperties)
        )
    ),
    new Rules\AssembleRule(new OpenEuropa\Assembler\HasPropertyAssembler()),
    new Rules\AssembleRule(new OpenEuropa\Assembler\EmptyArrayPropertyAssembler()),

    // Add "implements RequestInterface" to request classes.
    new Rules\IsRequestRule($config->getEngine()->getMetadata(),
        new Rules\MultiRule([
            new Rules\AssembleRule(new Assembler\RequestAssembler()),
        ])
    ),
    // Add "implements ResultInterface" to result classes.
    new Rules\IsResultRule($config->getEngine()->getMetadata(),
        new Rules\MultiRule([
            new Rules\AssembleRule(new Assembler\ResultAssembler()),
        ])
    ),
    new Rules\AssembleRule(new Assembler\ClassMapAssembler()),
    new Rules\AssembleRule(new Assembler\ClientConstructorAssembler()),
    new Rules\AssembleRule(new Assembler\ClientMethodAssembler()),
];

$config->setRuleSet(new Rules\RuleSet($rules));

// Add constructor assembler.
$classes = [
    'ContactPersonIn',
    'ContactPersonOut',
    'LinguisticSectionOut',
    'LinguisticSectionIn'
];
$config->addRule(new Rules\TypenameMatchesRule(
    new Rules\AssembleRule(
        new Assembler\ConstructorAssembler(
            (new Assembler\ConstructorAssemblerOptions())
                ->withTypeHints()
        )
    ),
    '/^('.implode('|', $classes).')$/'
));

return $config;
