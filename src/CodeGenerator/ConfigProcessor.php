<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator;

use Laminas\Code\Generator\PropertyGenerator;
use OpenEuropa\EPoetry\CodeGenerator as OpenEuropa;
use Phpro\SoapClient\CodeGenerator\Assembler;
use Phpro\SoapClient\CodeGenerator\Config\Config;
use Phpro\SoapClient\CodeGenerator\Rules;

class ConfigProcessor
{
    /**
     * Process code generation configuration object.
     *
     * @param \Phpro\SoapClient\CodeGenerator\Config\Config $config
     *  Code generation configuration object.
     * @param array $specialClassesAndProperties
     *   Mapping of classes and properties that will receive a special treatment
     *   in the assemblers. Sometimes they are used as a whitelist, sometimes as
     *   blacklist.
     * @param array $overridePropertyTypes
     *   Override specific property types when generating classes.
     *
     * @return \Phpro\SoapClient\CodeGenerator\Config\Config
     *   Configuration object instance.
     */
    public static function addRules(Config $config, array $specialClassesAndProperties = [], array $overridePropertyTypes = []): Config
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
                ->withReturnNull()
        );

        $arrayGetterAssembler = new OpenEuropa\Assembler\ArrayGetterAssembler(
            (new OpenEuropa\Assembler\ArrayGetterAssemblerOptions())
                ->whitelist($specialClassesAndProperties)
        );

        $fluentAdderAssembler = new OpenEuropa\Assembler\FluentAdderAssembler(
            (new OpenEuropa\Assembler\FluentAdderAssemblerOptions())
                ->whitelist($specialClassesAndProperties)
        );

        $hasPropertyAssembler = new OpenEuropa\Assembler\HasPropertyAssembler();

        return $config
        //            // Add the ResultInterface to classes that match given regex.
        //            ->addRule(
        //                new Rules\TypenameMatchesRule(
        //                    new Rules\AssembleRule(new Assembler\ResultAssembler()),
        //                    '/Response$/'
        //                )
        //            )
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
        //        // Set the default setter assembler and generate all setters methods.
        //            ->addRule(new Rules\AssembleRule($nullablePropertyAssembler))
        // Add has[Properties] only on some classes only.
            ->addRule(new Rules\AssembleRule($hasPropertyAssembler))
            ->addRule(
                new Rules\IsRequestRule(
                    $config->getEngine()->getMetadata(),
                    new Rules\MultiRule([
                        new Rules\AssembleRule(new Assembler\RequestAssembler()),
                    ])
                )
            )
            ->addRule(
                new Rules\IsResultRule(
                    $config->getEngine()->getMetadata(),
                    new Rules\MultiRule([
                        new Rules\AssembleRule(new Assembler\ResultAssembler()),
                    ])
                )
            );
    }

    /**
     * Add constructor to specific classes.
     *
     * This is used for very simple classes where fluent setters will make it
     * cumbersome to instantiate objects. For example:
     *
     * new ContactPersonIn('john', 'REQUESTER')
     *
     * @param \Phpro\SoapClient\CodeGenerator\Config\Config $config
     *      Configuration object.
     * @param array $classes
     *      Array of class names, without their namespace.
     *
     * @return \Phpro\SoapClient\CodeGenerator\Config\Config
     *      Configuration object.
     */
    public static function addConstructorRule(Config $config, array $classes)
    {
        return $config
            ->addRule(new Rules\TypenameMatchesRule(
                new Rules\AssembleRule(
                    new Assembler\ConstructorAssembler(
                        (new Assembler\ConstructorAssemblerOptions())
                            ->withTypeHints()
                    )
                ),
                '/^('.implode('|', $classes).')$/'
            ));
    }
}
