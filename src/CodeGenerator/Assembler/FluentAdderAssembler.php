<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Assembler\FluentSetterAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\ParameterGenerator;
use Zend\Code\Generator\TypeGenerator;

/**
 * Class FluentAdderAssembler.
 */
class FluentAdderAssembler extends AbstractAssembler
{
    /**
     * FluentAdderAssembler constructor.
     *
     * @param \OpenEuropa\EPoetry\CodeGenerator\Assembler\FluentAdderAssemblerOptions $options
     */
    public function __construct(FluentAdderAssemblerOptions $options = null)
    {
        $this->options = $options ?? new FluentSetterAssemblerOptions();
    }

    /**
     * {@inheritdoc}
     */
    public function assemble(ContextInterface $context)
    {
        $class = $context->getClass();
        $property = $context->getProperty();

        $type = $this->shortenNamespace(
            $property->getType(),
            $class->getNamespaceName()
        );

        $nameParameter = ParameterGenerator::fromArray([
            'name' => $property->getName() . 's',
        ])->setVariadic(true);

        $returnType = TypeGenerator::fromTypeString(
            $class->getNamespaceName() . '\\' . $class->getName()
        );

        $methodBody = $methodBody = sprintf(
            '$this->%1$s = array_merge($this->%1$s, $%1$ss);return $this;',
            $property->getName()
        );

        $addMethodData = [
            'name' => Normalizer::generatePropertyMethod('add', $property->getName()),
            'parameters' => [$nameParameter],
            'visibility' => MethodGenerator::VISIBILITY_PUBLIC,
            'returntype' => $returnType,
            'body' => $methodBody,
            'docblock' => DocBlockGenerator::fromArray([
                'tags' => [
                    [
                        'name' => 'param',
                        'description' => sprintf('%s ...$%ss', $type, $property->getName()),
                    ],
                    [
                        'name' => 'return',
                        'description' => '$this',
                    ],
                ],
            ]),
        ];

        $class
            ->addMethodFromGenerator(
                MethodGenerator::fromArray($addMethodData)
            );
    }
}
