<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;

/**
 * Class ArraySetterAssembler.
 *
 * Custom setter assembler
 *  - Update the docblock.
 *  - Update the type.
 */
class ArraySetterAssembler extends AbstractAssembler
{
    /**
     * ArraySetterAssembler constructor.
     *
     * @param null|\OpenEuropa\EPoetry\CodeGenerator\Assembler\ArraySetterAssemblerOptions $arraySetterAssemblerOptions
     */
    public function __construct(ArraySetterAssemblerOptions $arraySetterAssemblerOptions = null)
    {
        $this->options = $arraySetterAssemblerOptions ?? new ArraySetterAssemblerOptions();
    }

    /**
     * {@inheritdoc}
     */
    public function assemble(ContextInterface $context)
    {
        $class = $context->getClass();
        $property = $context->getProperty();

        $methodName = Normalizer::generatePropertyMethod('set', $property->getName());

        /** @var MethodGenerator $methodObject */
        $methodObject = $class->getMethod($methodName);

        $parameters = $methodObject->getParameters();
        foreach ($parameters as $parameter) {
            $parameter->setType('array');
        }
        $methodObject
            ->setParameters($parameters);

        $tags = $methodObject->getDocBlock()->getTags();

        $tags[0] = [
            'name' => 'param',
            'description' => str_replace(
                $property->getType(),
                $this->shortenNamespace(
                    $property->getType(),
                    $class->getNamespaceName()
                ) . '[]',
                $tags[0]->getDescription()
            ),
        ];

        $methodObject
            ->setDocBlock(
                DocBlockGenerator::fromArray([
                    'tags' => $tags,
                ])
            );
    }
}
