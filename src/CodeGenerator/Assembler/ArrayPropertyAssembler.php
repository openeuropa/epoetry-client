<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\PropertyGenerator;

/**
 * Class ArrayPropertyAssembler.
 */
class ArrayPropertyAssembler extends AbstractAssembler
{
    /**
     * @var \OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayPropertyAssemblerOptions
     */
    protected $options;

    /**
     * ArrayPropertyAssembler constructor.
     *
     * @param \OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayPropertyAssemblerOptions $options
     */
    public function __construct(ArrayPropertyAssemblerOptions $options)
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

        /** @var PropertyGenerator $propertyObject */
        $propertyObject = $class->getProperty($property->getName());

        $tags = $propertyObject->getDocBlock()->getTags();

        $propertyObject->setDocBlock(
            DocBlockGenerator::fromArray([
                'tags' => [
                    [
                        'name' => 'var',
                        'description' => str_replace($property->getType(), $property->getType() . '[]', $tags[0]->getDescription()),
                    ],
                ],
            ])
        );
    }
}
