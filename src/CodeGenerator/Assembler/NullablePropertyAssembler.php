<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Laminas\Code\Generator\DocBlockGenerator;
use Laminas\Code\Generator\PropertyGenerator;

/**
 * Class NullablePropertyAssembler.
 *
 * Custom property assembler for specific properties.
 *  - Update the property type and set it nullable.
 *  - Update the docblock's tags.
 */
class NullablePropertyAssembler extends AbstractAssembler
{
    /**
     * NullablePropertyAssembler constructor.
     *
     * @param null|\OpenEuropa\EPoetry\CodeGenerator\Assembler\NullablePropertyAssemblerOptions $options
     */
    public function __construct(NullablePropertyAssemblerOptions $options = null)
    {
        $this->options = $options ?? new NullablePropertyAssemblerOptions();
    }

    /**
     * {@inheritdoc}
     */
    public function assemble(ContextInterface $context)
    {
        $class = $context->getClass();
        $property = $context->getProperty();

        /** @var PropertyGenerator $propertyObject */
        $propertyObject = $class->getProperty($property->getName());

        $tags = $propertyObject->getDocBlock()->getTags();

        $propertyObject->setDocBlock(
            DocBlockGenerator::fromArray([
                'tags' => [
                    [
                        'name' => 'var',
                        'description' => 'null|' . $tags[0]->getDescription(),
                    ],
                ],
            ])
        );
    }
}
