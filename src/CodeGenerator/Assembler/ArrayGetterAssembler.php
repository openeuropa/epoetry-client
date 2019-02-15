<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;

/**
 * Class ArrayGetterAssembler.
 */
class ArrayGetterAssembler extends AbstractAssembler
{
    /**
     * @var \OpenEuropa\EPoetry\CodeGenerator\Assembler\ArrayGetterAssemblerOptions
     */
    protected $options;

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

        /** @var MethodGenerator $methodObject */
        $methodObject = $class->getMethod($methodName);

        $methodObject
            ->setReturnType('?array');

        $tags = $methodObject->getDocBlock()->getTags();

        $methodObject
            ->setDocBlock(
                DocBlockGenerator::fromArray([
                    'tags' => [
                        [
                            'name' => 'return',
                            'description' => str_replace($property->getType(), $property->getType() . '[]', $tags[0]->getDescription()),
                        ],
                    ],
                ])
            );
    }
}
