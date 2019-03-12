<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;

/**
 * Add support for nullable return type declarations.
 *
 * Custom getter assembler for specific properties.
 *  - Update the return type and set it nullable.
 *  - Update the docblock's tags.
 */
class NullableGetterAssembler extends AbstractAssembler
{
    /**
     * NullableGetterAssembler constructor.
     *
     * @param null|\OpenEuropa\EPoetry\CodeGenerator\Assembler\NullableGetterAssemblerOptions $options
     */
    public function __construct(NullableGetterAssemblerOptions $options = null)
    {
        $this->options = $options ?? new NullableGetterAssemblerOptions();
    }

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

        /** @var \Zend\Code\Generator\MethodGenerator $method */
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
