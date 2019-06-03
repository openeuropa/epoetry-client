<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\PropertyGenerator;

/**
 * Allow to override the type of specific properties.
 */
class OverrideTypeAssembler implements AssemblerInterface
{
    /**
     * @var \OpenEuropa\EPoetry\CodeGenerator\Assembler\OverrideTypeAssemblerOptions
     */
    protected $options;

    /**
     * OverrideTypePropertyAssembler constructor.
     *
     * @param \OpenEuropa\EPoetry\CodeGenerator\Assembler\OverrideTypeAssemblerOptions $options
     */
    public function __construct(OverrideTypeAssemblerOptions $options)
    {
        $this->options = $options;
    }

    /**
     * {@inheritdoc}
     */
    public function assemble(ContextInterface $context)
    {
        /** @var \Zend\Code\Generator\ClassGenerator $class */
        $class = $context->getClass();
        $propertyName = $context->getProperty()->getName();

        /** @var PropertyGenerator $propertyObject */
        $propertyObject = $class->getProperty($propertyName);
        $propertyType = $this->options->getPropertyType($class->getName(), $propertyName);
        $propertyType = '\\' . $class->getNamespaceName() . '\\' . $propertyType;

        // Override docblock type on parameters matching current property name.
        $propertyObject->setDocBlock(
            DocBlockGenerator::fromArray([
                'tags' => [
                    [
                        'name' => 'var',
                        'description' => $propertyType,
                    ],
                ],
            ])
        );

        // Generate getter method name for current property.
        $getterMethodName = Normalizer::generatePropertyMethod('get', $propertyName);

        // Override type on method parameters matching current property name.
        foreach ($class->getMethods() as $method) {
            // Override matching method parameter.
            if (\array_key_exists($propertyName, $method->getParameters())) {
                // Override method docblock for matching parameters.
                foreach ($method->getDocBlock()->getTags() as $tag) {
                    if (strstr($tag->getContent(), "\${$propertyName}") !== false) {
                        $tag->setContent("{$propertyType} \${$propertyName}");
                    }
                }

                // Override method parameter's type.
                $method->getParameters()[$propertyName]->setType($propertyType);
            }

            // Override matching property's setter return type, if any.
            if ($method->getName() === $getterMethodName) {
                $method->setReturnType($propertyType);

                // Getters only have a "return" tag in their docblock.
                if (!empty($method->getDocBlock()->getTags())) {
                    $method->getDocBlock()->getTags()[0]->setContent("{$propertyType}");
                }
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function canAssemble(ContextInterface $context): bool
    {
        if ($context instanceof PropertyContext) {
            $propertyName = $context->getProperty()->getName();
            $className = $context->getClass()->getName();

            return $this->options->hasPropertyTypeOverride($className, $propertyName);
        }

        return false;
    }
}
