<?php

declare(strict_types = 1);

use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\CodeGenerator\Rules;
use Zend\Code\Generator\PropertyGenerator;

/**
 * This variables holds a mapping of classes and properties that will receive
 * a special treatment in the assemblers.
 * Sometimes they are used as a whitelist, sometimes as blacklist.
 */
$specialClassesAndProperties = [
    'ProductRequests' => ['productRequest'],
];

$defaultPropertyAssembler = new Assembler\PropertyAssembler(PropertyGenerator::VISIBILITY_PROTECTED);

$arrayPropertyAssembler = new OpenEuropa\Assembler\ArrayPropertyAssembler(
    (new OpenEuropa\Assembler\ArrayPropertyAssemblerOptions())
        ->whitelist($specialClassesAndProperties)
);

$nullablePropertyAssembler = new OpenEuropa\Assembler\NullablePropertyAssembler(
    (new OpenEuropa\Assembler\NullablePropertyAssemblerOptions())
        ->blacklist($specialClassesAndProperties)
);

$defaultSetterAssembler = new Assembler\FluentSetterAssembler(
    (new Assembler\FluentSetterAssemblerOptions())
        ->withTypeHints()
        ->withReturnType()
);

$arraySetterAssembler = new OpenEuropa\Assembler\ArraySetterAssembler(
    (new OpenEuropa\Assembler\ArraySetterAssemblerOptions())
        ->whitelist($specialClassesAndProperties)
);

$defaultGetterAssembler = new Assembler\GetterAssembler(
    (new Assembler\GetterAssemblerOptions())
        ->withReturnType()
        ->withBoolGetters()
);

$arrayGetterAssembler = new OpenEuropa\Assembler\ArrayGetterAssembler(
    (new OpenEuropa\Assembler\ArrayGetterAssemblerOptions())
        ->whitelist($specialClassesAndProperties)
);

$nullableGetterAssembler = new OpenEuropa\Assembler\NullableGetterAssembler(
    (new OpenEuropa\Assembler\NullableGetterAssemblerOptions())
        ->blacklist($specialClassesAndProperties)
);

$fluentAdderAssembler = new OpenEuropa\Assembler\FluentAdderAssembler(
    (new OpenEuropa\Assembler\FluentAdderAssemblerOptions())
        ->whitelist($specialClassesAndProperties)
);

$hasPropertyAssembler = new OpenEuropa\Assembler\HasPropertyAssembler();

return Config::create()
    ->setWsdl('resources/NotificationService.xml')
    ->setTypeDestination('src/Notification/Type')
    ->setTypeNamespace('OpenEuropa\EPoetry\Notification\Type')
    ->setClientDestination('src/Notification/')
    ->setClientName('NotificationClient')
    ->setClientNamespace('OpenEuropa\Notification')
    ->setClassMapDestination('src/Notification/')
    ->setClassMapName('NotificationClassmap')
    ->setClassMapNamespace('OpenEuropa\EPoetry\Notification')
// We have to do this as the SOAP handler will erroneously create duplicate
// public properties when a value object extends another one with those
// same properties marked as "private".
    ->setRuleSet(
        new Rules\RuleSet(
            [
                new Rules\AssembleRule(new Assembler\ClassMapAssembler()),
            ]
        )
    )
    ->addRule(
        new Rules\TypenameMatchesRule(
            new Rules\AssembleRule(new Assembler\ResultAssembler()),
            '/Response$/'
        )
    )
// Generate SOAP request classes.
//
// Request objects must implement \Phpro\SoapClient\Type\RequestInterface
// The rule matches the following SOAP types:
//
// - receiveNotification
    ->addRule(
        new Rules\TypenameMatchesRule(
            new Rules\AssembleRule(new Assembler\RequestAssembler()),
            '/(ReceiveNotification)$/'
        )
    )
// Set the default property assembler and generate all properties.
    ->addRule(new Rules\AssembleRule($defaultPropertyAssembler))
// Update properties and set them as 'nullable'
    ->addRule(new Rules\AssembleRule($arrayPropertyAssembler))
// Set the default setter assembler and generate all setters methods.
    ->addRule(new Rules\AssembleRule($nullablePropertyAssembler))
// Update properties and update only some of them.
    ->addRule(new Rules\AssembleRule($defaultSetterAssembler))
// Update setters and update only some of them.
    ->addRule(new Rules\AssembleRule($arraySetterAssembler))
// Set the default getter assembler and generate all getters methods.
    ->addRule(new Rules\AssembleRule($defaultGetterAssembler))
// Update getters and set them as 'nullable'
    ->addRule(new Rules\AssembleRule($nullableGetterAssembler))
// Update getters and update only some of them.
    ->addRule(new Rules\AssembleRule($arrayGetterAssembler))
// Add adders only on some classes only.
    ->addRule(new Rules\AssembleRule($fluentAdderAssembler))
// Add has[Properties] only on some classes only.
    ->addRule(new Rules\AssembleRule($hasPropertyAssembler));
