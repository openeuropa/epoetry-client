<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\Model\Property;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Phpro\SoapClient\CodeGenerator\Util\TypeChecker;
use Phpro\SoapClient\Exception\AssemblerException;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;

/**
 * Class InterfaceReplacementAssembler.
 */
class InterfaceReplacementAssembler implements AssemblerInterface
{
    /**
     * @var InterfaceReplacementAssemblerOptions
     */
    private $options;

    /**
     * AdderAssembler constructor.
     *
     * @param InterfaceReplacementAssemblerOptions $options
     */
    public function __construct(InterfaceReplacementAssemblerOptions $options)
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
            $methodName = Normalizer::generatePropertyMethod('set', $property->getName());
            $class->removeMethod($methodName);
            $class->addMethodFromGenerator(
                MethodGenerator::fromArray([
                    'name' => $methodName,
                    'parameters' => $this->getParameter($property),
                    'visibility' => MethodGenerator::VISIBILITY_PUBLIC,
                    'body' => sprintf(
                        '$this->%1$s = $%1$s;%2$sreturn $this;',
                        $property->getName(),
                        $class::LINE_FEED
                    ),
                    'returntype' => $this->options->useReturnType()
                        ? current($context->getClass()->getImplementedInterfaces())
                        : null,
                    'docblock' => DocBlockGenerator::fromArray([
                        'tags' => [
                            [
                                'name' => 'param',
                                'description' => sprintf('%s $%s', $property->getType(), $property->getName()),
                            ],
                            [
                                'name' => 'return',
                                'description' => $context->getClass()->getImplementedInterfaces()[0],
                            ],
                        ],
                    ]),
                ])
            );
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

        return \count($context->getClass()->getImplementedInterfaces()) === 1;
    }

    /**
     * @param Property $property
     *
     * @return array
     */
    private function getParameter(Property $property): array
    {
        $type = $property->getType();
        if (TypeChecker::isKnownType($type) && $this->options->useTypeHints()) {
            return [
                [
                    'name' => $property->getName(),
                    'type' => $type,
                ],
            ];
        }

        return [$property->getName()];
    }
}
