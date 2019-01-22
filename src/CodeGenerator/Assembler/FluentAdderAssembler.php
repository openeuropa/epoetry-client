<?php

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Phpro\SoapClient\Exception\AssemblerException;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\PropertyGenerator;
use Zend\Code\Generator\PropertyValueGenerator;
use Zend\Code\Generator\ValueGenerator;

/**
 * Class AdderAssembler
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
            if ($this->options->useTypeHints()) {
                $parameterOptions['type'] = $property->getType();
            }
            $methodName = Normalizer::generatePropertyMethod('add', $property->getName());
            $class->removeMethod($methodName);
            $class->addMethodFromGenerator(
                MethodGenerator::fromArray(
                    [
                        'name' => $methodName,
                        'parameters' => [$parameterOptions],
                        'visibility' => MethodGenerator::VISIBILITY_PUBLIC,
                        'body' => sprintf(
                            '$this->%1$s = is_array($this->%1$s) ? $this->%1$s : [];%2$s$this->%1$s[] = $%1$s;%2$sreturn $this;',
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
                                        'name'        => 'return',
                                        'description' => '$this',
                                    ],
                                ],
                            ]
                        ),
                    ]
                )
            );
            $class->removeProperty($property->getName());
            $class->addPropertyFromGenerator(
                PropertyGenerator::fromArray([
                    'name' => $property->getName(),
                    'defaultvalue' => new PropertyValueGenerator([], ValueGenerator::TYPE_ARRAY_SHORT, ValueGenerator::OUTPUT_SINGLE_LINE),
                    'visibility' => PropertyGenerator::VISIBILITY_PRIVATE,
                    'omitdefaultvalue' => false,
                    'docblock' => DocBlockGenerator::fromArray([
                        'tags' => [
                            [
                                'name'        => 'var',
                                'description' => 'array',
                            ],
                        ]
                    ])
                ])
            );
        } catch (\Exception $e) {
            throw AssemblerException::fromException($e);
        }
    }
}
