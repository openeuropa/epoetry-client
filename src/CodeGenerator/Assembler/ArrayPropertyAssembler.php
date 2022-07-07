<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Laminas\Code\Generator\DocBlockGenerator;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;

/**
 * Class ArrayPropertyAssembler.
 *
 * Custom property assembler for specific properties.
 *  - Update the property type.
 *  - Update the docblock's tags.
 */
class ArrayPropertyAssembler extends AbstractAssembler
{
    /**
     * ArrayPropertyAssembler constructor.
     *
     * @param \OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayPropertyAssemblerOptions $options
     */
    public function __construct(ArrayPropertyAssemblerOptions $options = null)
    {
        $this->options = $options ?? new ArrayPropertyAssemblerOptions();
    }

    /**
     * {@inheritdoc}
     */
    public function assemble(ContextInterface $context)
    {
        $class = $context->getClass();
        $property = $context->getProperty();

        /** @var \Laminas\Code\Generator\PropertyGenerator $propertyObject */
        $propertyObject = $class->getProperty($property->getName());

        $propertyObject->omitDefaultValue(false);
        $propertyObject->setDefaultValue([], 'array', '[]');

        $tags = $propertyObject->getDocBlock()->getTags();

        $description = $tags[0]->getDescription();
        $description = str_replace($property->getType(), $property->getType() . '[]|array', $description);

        $propertyObject->setDocBlock(
            DocBlockGenerator::fromArray([
                'tags' => [
                    [
                        'name' => 'var',
                        'description' => $description,
                    ],
                ],
            ])
        );
    }
}
