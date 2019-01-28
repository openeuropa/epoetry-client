<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Phpro\SoapClient\Exception\AssemblerException;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\PropertyValueGenerator;
use Zend\Code\Generator\ValueGenerator;

/**
 * Class AdderAssembler.
 */
class FluentAdderAssembler implements AssemblerInterface
{
    /**
     * @var FluentAdderAssemblerOptions
     */
    private $options;

    /**
     * AdderAssembler constructor.
     *
     * @param FluentAdderAssemblerOptions $options
     */
    public function __construct(FluentAdderAssemblerOptions $options)
    {
        $this->options = $options;
    }

    /**
     * @param ContextInterface|PropertyContext $context
     *
     * @throws AssemblerException
     */
    public function assemble(ContextInterface $context)
    {
        $class = $context->getClass();
        $property = $context->getProperty();

        try {
            $parameterOptions = ['name' => $property->getName()];

            // Add "adder" method.
            $methodName = Normalizer::generatePropertyMethod('add', $property->getName());
            $class->removeMethod($methodName);
            $class->addMethodFromGenerator(
                MethodGenerator::fromArray(
                    [
                        'name' => $methodName,
                        'parameters' => [$parameterOptions],
                        'visibility' => MethodGenerator::VISIBILITY_PUBLIC,
                        'returntype' => $this->options->useReturnType() ? $class->getNamespaceName() . '\\' . $class->getName() : null,
                        'body' => sprintf(
                            '$this->%1$s[] = $%1$s;%2$sreturn $this;',
                            $property->getName(),
                            $class::LINE_FEED
                        ),
                        'docblock' => DocBlockGenerator::fromArray(
                            [
                                'tags' => [
                                    [
                                        'name' => 'param',
                                        'description' => sprintf('%s $%s', $property->getType(), $property->getName()),
                                    ],
                                    [
                                        'name' => 'return',
                                        'description' => '$this',
                                    ],
                                ],
                            ]
                        ),
                    ]
                )
            );

            // If property is available update its dockblock and default value.
            if ($class->hasProperty($property->getName())) {
                $class->getProperty($property->getName())->setDocBlock(DocBlockGenerator::fromArray([
                    'tags' => [
                        [
                            'name' => 'var',
                            'description' => $property->getType() . '[]',
                        ],
                    ],
                ]));
                $class->getProperty($property->getName())->setDefaultValue(new PropertyValueGenerator([], ValueGenerator::TYPE_ARRAY_SHORT, ValueGenerator::OUTPUT_SINGLE_LINE));
            }

            // If setter is available update its dockblock and return value.
            $getterMethodName = Normalizer::generatePropertyMethod('get', $property->getName());
            if ($class->hasMethod($getterMethodName)) {
                $class->getMethod($getterMethodName)->setReturnType('array');
                $class->getMethod($getterMethodName)->setDocBlock(DocBlockGenerator::fromArray([
                    'tags' => [
                        [
                            'name' => 'return',
                            'description' => $property->getType() . '[]',
                        ],
                    ],
                ]));
            }
        } catch (\Exception $e) {
            throw AssemblerException::fromException($e);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function canAssemble(ContextInterface $context): bool
    {
        if (!$context instanceof PropertyContext) {
            return false;
        }

        $class = $context->getClass();
        $property = $context->getProperty();

        return $this->options->hasProperty($class->getName(), $property->getName());
    }
}
