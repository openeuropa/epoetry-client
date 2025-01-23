<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\Exception\AssemblerException;

/**
 * Add en empty array as default value on list types.
 */
class EmptyArrayPropertyAssembler implements AssemblerInterface
{
    /**
     * {@inheritdoc}
     */
    public function canAssemble(ContextInterface $context): bool
    {
        return $context instanceof PropertyContext;
    }

    /**
     * @param ContextInterface|PropertyContext $context
     *
     * @throws AssemblerException
     */
    public function assemble(ContextInterface $context)
    {
        try {
            $class = $context->getClass();
            $property = $context->getProperty();

            // Only apply array default value to list properties.
            $meta = $property->getMeta()->isList();
            if ($meta->isNone() || $meta->unwrap() === false) {
                return;
            }

            /** @var \Laminas\Code\Generator\PropertyGenerator $propertyObject */
            $propertyObject = $class->getProperty($property->getName());
            $propertyObject->omitDefaultValue(false);
            $propertyObject->setDefaultValue([], 'array', '[]');
        } catch (\Exception $e) {
            throw AssemblerException::fromException($e);
        }
    }
}

