<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Laminas\Code\Generator\DocBlockGenerator;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;

/**
 * Class ArrayGetterAssembler.
 *
 * Custom getter assembler for specific properties.
 *  - Adds a return type to the original getter.
 *  - Update the docblock's return tag.
 */
class ArrayGetterAssembler extends AbstractAssembler
{
    /**
     * ArrayGetterAssembler constructor.
     *
     * @param null|\OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayGetterAssemblerOptions $arrayGetterAssemblerOptions
     */
    public function __construct(ArrayGetterAssemblerOptions $arrayGetterAssemblerOptions = null)
    {
        $this->options = $arrayGetterAssemblerOptions ?? new ArrayGetterAssemblerOptions();
    }

    /**
     * {@inheritdoc}
     */
    public function assemble(ContextInterface $context)
    {
        $class = $context->getClass();
        $property = $context->getProperty();

        $methodName = Normalizer::generatePropertyMethod('get', $property->getName());

        /** @var \Laminas\Code\Generator\MethodGenerator $methodObject */
        $methodObject = $class->getMethod($methodName);

        $methodObject
            ->setReturnType('array');

        $tags = $methodObject->getDocBlock()->getTags();

        $methodObject
            ->setDocBlock(
                DocBlockGenerator::fromArray([
                    'tags' => [
                        [
                            'name' => 'return',
                            'description' => str_replace($property->getType(), $property->getType() . '[]|array', $tags[0]->getDescription()),
                        ],
                    ],
                ])
            );
    }
}
