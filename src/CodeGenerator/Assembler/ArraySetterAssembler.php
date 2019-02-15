<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;

/**
 * Class ArraySetterAssembler.
 */
class ArraySetterAssembler extends AbstractAssembler
{
    /**
     * @var \OpenEuropa\EPoetry\CodeGenerator\Assembler\ArraySetterAssemblerOptions
     */
    protected $options;

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
        $methodObject
            ->setDocBlock(
                DocBlockGenerator::fromArray([
                    'tags' => [
                        [
                            'name' => 'param',
                            'description' => str_replace(
                                $property->getType(),
                                $this->shortenNamespace(
                                    $property->getType(),
                                    $class->getNamespaceName()
                                ) . '[]',
                                $tags[0]->getDescription()
                            ),
                        ],
                        $tags[1],
                    ],
                ])
            );
    }
}
