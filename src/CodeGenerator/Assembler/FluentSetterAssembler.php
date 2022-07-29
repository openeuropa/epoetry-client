<?php

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Laminas\Code\Generator\MethodGenerator;
use Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface;
use Phpro\SoapClient\CodeGenerator\Assembler\FluentSetterAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\LaminasCodeFactory\DocBlockGeneratorFactory;
use Phpro\SoapClient\CodeGenerator\Model\Property;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Phpro\SoapClient\Exception\AssemblerException;

/**
 * Copy of \Phpro\SoapClient\CodeGenerator\Assembler\FluentSetterAssembler.
 *
 * We must duplicate this assembles as its use of private properties and methods
 * makes it impossible to alter the getParameter() method behavior.
 *
 * Check the getParameter() method below for more information.
 */
class FluentSetterAssembler implements AssemblerInterface
{
    /**
     * @var FluentSetterAssemblerOptions
     */
    private $options;

    /**
     * FluentSetterAssembler constructor.
     *
     * @param FluentSetterAssemblerOptions|null $options
     */
    public function __construct(FluentSetterAssemblerOptions $options = null)
    {
        $this->options = $options ?? new FluentSetterAssemblerOptions();
    }

    /**
     * {@inheritdoc}
     */
    public function canAssemble(ContextInterface $context): bool
    {
        return $context instanceof PropertyContext;
    }

    /**
     * @param ContextInterface|PropertyContext $context
     * @throws AssemblerException
     */
    public function assemble(ContextInterface $context)
    {
        $class = $context->getClass();
        $property = $context->getProperty();
        try {
            $methodName = Normalizer::generatePropertyMethod('set', $property->getName());
            $class->removeMethod($methodName);

            $methodGenerator = new MethodGenerator($methodName);
            $methodGenerator->setParameters($this->getParameter($property));
            $methodGenerator->setVisibility(MethodGenerator::VISIBILITY_PUBLIC);
            $methodGenerator->setBody(sprintf(
                '$this->%1$s = $%1$s;%2$sreturn $this;',
                $property->getName(),
                $class::LINE_FEED
            ));
            if ($this->options->useReturnType()) {
                $methodGenerator->setReturnType($class->getNamespaceName().'\\'.$class->getName());
            }
            if ($this->options->useDocBlocks()) {
                $methodGenerator->setDocBlock(DocBlockGeneratorFactory::fromArray([
                    'tags' => [
                        [
                            'name'        => 'param',
                            'description' => sprintf('%s $%s', $property->getType(), $property->getName()),
                        ],
                        [
                            'name'        => 'return',
                            'description' => '$this',
                        ],
                    ],
                ]));
            }
            $class->addMethodFromGenerator($methodGenerator);
        } catch (\Exception $e) {
            throw AssemblerException::fromException($e);
        }
    }

    /**
     * @param Property $property
     *
     * @return array
     */
    private function getParameter(Property $property): array
    {
        // Make sure we always type setter arguments.
        // We need to do this until \Phpro\SoapClient\CodeGenerator\Util\TypeChecker::isClassType()
        // gets implemented correctly: at the moment that method returns always
        // "false", while we can be confident that the calsses will be available.
        // @todo: remove this class and fall back to Phpro\SoapClient\CodeGenerator\Assembler\FluentSetterAssembler
        // once the parent class will be fully implemented.
        $type = $property->getType();
        return [
            [
                'name' => $property->getName(),
                'type' => $type,
            ],
        ];
    }
}
