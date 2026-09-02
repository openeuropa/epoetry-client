<?php

use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\Soap\DefaultEngineFactory;
use Phpro\SoapClient\Soap\EngineOptions;
use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use OpenEuropa\EPoetry\CodeGenerator\Metadata\PreserveTypeNamesManipulator;
use OpenEuropa\EPoetry\CodeGenerator\Metadata\SuppressEnumGenerationManipulator;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Rules;
use Phpro\SoapClient\Soap\Metadata\Manipulators\DuplicateTypes\IntersectDuplicateTypesStrategy;
use Phpro\SoapClient\Soap\Metadata\Manipulators\TypesManipulatorChain;
use Phpro\SoapClient\Soap\Metadata\MetadataOptions;

$engine = DefaultEngineFactory::create(
    EngineOptions::defaults(__DIR__ . '/../resources/request.wsdl')
);
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
    new Rules\AssembleRule(
        new OpenEuropa\Assembler\FluentAdderAssembler(
            (new OpenEuropa\Assembler\FluentAdderAssemblerOptions())
                ->whitelist($specialClassesAndProperties)
        )
    ),
    new Rules\AssembleRule(new OpenEuropa\Assembler\HasPropertyAssembler()),
    new Rules\AssembleRule(new OpenEuropa\Assembler\EmptyArrayPropertyAssembler()),

    // Add "implements RequestInterface" to request classes.
    new Rules\IsRequestRule(
        $config->getEngine()->getMetadata(),
        new Rules\MultiRule([
            new Rules\AssembleRule(new Assembler\RequestAssembler()),
        ])
    ),
    // Add "implements ResultInterface" to result classes.
    new Rules\IsResultRule(
        $config->getEngine()->getMetadata(),
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
    '/^(' . implode('|', $classes) . ')$/'
));

// Customize metadata to preserve backward compatibility with v3.
// PreserveTypeNamesManipulator: renames v4 parent-prefixed inline types
//   back to v3 shared names (e.g. RequestDetailsInContacts → Contacts).
// SuppressEnumGenerationManipulator: prevents PHP enum generation for XSD
//   enumerations, keeping string-based setters/getters.
// IntersectDuplicateTypesStrategy: merges the renamed duplicate types
//   into single shared types (required after PreserveTypeNamesManipulator).
$config->setMetadataOptions(
    MetadataOptions::empty()
        ->withTypesManipulator(
            new TypesManipulatorChain(
                new PreserveTypeNamesManipulator(),
                new SuppressEnumGenerationManipulator(),
                new IntersectDuplicateTypesStrategy($config->getCodeGeneratorContext()),
            )
        )
);

return $config;
