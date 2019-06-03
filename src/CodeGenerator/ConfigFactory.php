<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator;

use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\CodeGenerator\Rules;
use Zend\Code\Generator\PropertyGenerator;

class ConfigFactory
{
    /**
     * @param array $specialClassesAndProperties
     *   Mapping of classes and properties that will receive a special treatment
     *   in the assemblers. Sometimes they are used as a whitelist, sometimes as
     *   blacklist.
     *
     * @return \Phpro\SoapClient\CodeGenerator\Config\Config
     *   Configuration object instance.
     */
    public static function create(array $specialClassesAndProperties, array $overridePropertyTypes): Config
    {
        // Set all property visibility to "protected".
        // We have to do this as the SOAP handler will erroneously create duplicate
        // public properties when a value object extends another one with those
        // same properties marked as "private".
        $defaultPropertyAssembler = new Assembler\PropertyAssembler(PropertyGenerator::VISIBILITY_PROTECTED);

        $arrayPropertyAssembler = new OpenEuropa\Assembler\ArrayPropertyAssembler(
            (new OpenEuropa\Assembler\ArrayPropertyAssemblerOptions())
                ->whitelist($specialClassesAndProperties)
        );

        $defaultSetterAssembler = new Assembler\FluentSetterAssembler(
            (new Assembler\FluentSetterAssemblerOptions())
                ->withTypeHints()
                ->withReturnType()
        );

        $nullablePropertyAssembler = new OpenEuropa\Assembler\NullablePropertyAssembler(
            (new OpenEuropa\Assembler\NullablePropertyAssemblerOptions())
                ->blacklist($specialClassesAndProperties)
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
            ->setRuleSet(
                new Rules\RuleSet(
                    [
                        new Rules\AssembleRule(new Assembler\ClassMapAssembler()),
                    ]
                )
            )
        // Add the ResultInterface to classes that match given regex.
            ->addRule(
                new Rules\TypenameMatchesRule(
                    new Rules\AssembleRule(new Assembler\ResultAssembler()),
                    '/Response$/'
                )
            )
        // Set the default property assembler and generate all properties.
            ->addRule(new Rules\AssembleRule($defaultPropertyAssembler))
        // Update properties and set them as 'nullable'
            ->addRule(new Rules\AssembleRule($arrayPropertyAssembler))
        // Update properties and update only some of them.
            ->addRule(new Rules\AssembleRule($defaultSetterAssembler))
        // Update setters and update only some of them.
            ->addRule(new Rules\AssembleRule($arraySetterAssembler))
        // Set the default getter assembler and generate all getters methods.
            ->addRule(new Rules\AssembleRule($defaultGetterAssembler))
        // Update getters and update only some of them.
            ->addRule(new Rules\AssembleRule($arrayGetterAssembler))
        // Add adders only on some classes only.
            ->addRule(new Rules\AssembleRule($fluentAdderAssembler))
        // Override property and method types.
            ->addRule(new Rules\AssembleRule(
                new OpenEuropa\Assembler\OverridePropertyTypeAssembler(
                    (new OpenEuropa\Assembler\OverridePropertyTypeAssemblerOptions())
                        ->setPropertyTypeMapping($overridePropertyTypes)
                )
            ))
        // Set the default setter assembler and generate all setters methods.
            ->addRule(new Rules\AssembleRule($nullablePropertyAssembler))
        // Update getters and set them as 'nullable'
            ->addRule(new Rules\AssembleRule($nullableGetterAssembler))
        // Add has[Properties] only on some classes only.
            ->addRule(new Rules\AssembleRule($hasPropertyAssembler));
    }
}
