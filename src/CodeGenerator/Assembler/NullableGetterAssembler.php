<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;

/**
 * Add support for nullable return type declarations.
 */
class NullableGetterAssembler extends AbstractAssembler
{
    /**
     * {@inheritdoc}
     */
    public function assemble(ContextInterface $context)
    {
        $property = $context->getProperty();
        $class = $context->getClass();

        // Update the docblock of the getter method associated to the property.
        $prefix = $this->getPrefix($context->getProperty());
        $getMethodName = Normalizer::generatePropertyMethod(
            $prefix,
            $property->getName()
        );

        $method = $class->getMethod($getMethodName);
        $docblock = $method->getDocBlock();
        foreach ($docblock->getTags() as $tag) {
            $description = explode('|', (string) $tag->getDescription());
            if (!\in_array('null', $description, true)) {
                $description[] = 'null';
            }
            $tag->setDescription(implode('|', $description));
        }
        $method
            ->setDocBlock($docblock);

        // Update the return type.
        $method->setReturnType('?' . $method->getReturnType());
    }
}
