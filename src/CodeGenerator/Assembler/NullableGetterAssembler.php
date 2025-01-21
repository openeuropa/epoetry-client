<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface;
use Phpro\SoapClient\CodeGenerator\Assembler\GetterAssembler;
use Phpro\SoapClient\CodeGenerator\Assembler\GetterAssemblerOptions;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\Model\Property;
use Phpro\SoapClient\CodeGenerator\Util\Normalizer;
use Phpro\SoapClient\CodeGenerator\LaminasCodeFactory\DocBlockGeneratorFactory;
use Phpro\SoapClient\Exception\AssemblerException;
use Laminas\Code\Generator\MethodGenerator;
use Soap\Engine\Metadata\Model\TypeMeta;

/**
 * Class NullableGetterAssembler
 *
 * @see GetterAssembler
 */
class NullableGetterAssembler implements AssemblerInterface
{
    /**
     * @var NullableGetterAssemblerOptions
     */
    private $options;

    /**
     * GetterAssembler constructor.
     *
     * @param NullableGetterAssemblerOptions|null $options
     */
    public function __construct(?NullableGetterAssemblerOptions $options = null)
    {
        $this->options = $options ?? new NullableGetterAssemblerOptions();
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
     *
     * @throws AssemblerException
     */
    public function assemble(ContextInterface $context)
    {
        $class = $context->getClass();
        $property = $context->getProperty();

        // Property might be forced to be nullable by the code generator.
        if ($this->options->useOptionalValue()) {
            $property = $property->withMeta(fn(TypeMeta $meta): TypeMeta => $meta->withIsNullable(true));
        }

        try {
            $prefix = $this->getPrefix($property);
            $methodName = Normalizer::generatePropertyMethod($prefix, $property->getName());
            $class->removeMethod($methodName);

            $methodGenerator = new MethodGenerator($methodName);
            $methodGenerator->setVisibility(MethodGenerator::VISIBILITY_PUBLIC);
            $methodGenerator->setBody(sprintf('return $this->%s;', $property->getName()));

            if ($this->options->useReturnType()) {
                $returnType = $this->options->useReturnNull() ? '?' . $property->getPhpType() : $property->getPhpType();
                $methodGenerator->setReturnType($returnType);
            }

            if ($this->options->useDocBlocks()) {
                $propertyType = $this->options->useReturnNull() ? $property->getType() . '|null' : $property->getType();
                $methodGenerator->setDocBlock(DocBlockGeneratorFactory::fromArray([
                    'tags' => [
                        [
                            'name'        => 'return',
                            'description' => $propertyType,
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
     * @return non-empty-string
     */
    public function getPrefix(Property $property): string
    {
        if (!$this->options->useBoolGetters()) {
            return 'get';
        }

        return $property->getType() === 'bool' ? 'is' : 'get';
    }
}
