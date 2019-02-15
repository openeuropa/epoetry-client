<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Assembler\AssemblerInterface;
use Phpro\SoapClient\CodeGenerator\Context\ContextInterface;
use Phpro\SoapClient\CodeGenerator\Context\PropertyContext;
use Phpro\SoapClient\CodeGenerator\Model\Property;

/**
 * Class AbstractAssembler.
 */
abstract class AbstractAssembler implements AssemblerInterface
{
    /**
     * {@inheritdoc}
     */
    public function canAssemble(ContextInterface $context): bool
    {
        if (!$context instanceof PropertyContext) {
            return false;
        }

        if (!isset($this->options)) {
            return true;
        }

        $class = $context->getClass();
        $property = $context->getProperty();

        return $this->options->isFiltered(
            $class->getName(),
            $property->getName()
        );
    }

    /**
     * @param Property $property
     *
     * @return string
     */
    protected function getPrefix(Property $property): string
    {
        if (isset($this->options)) {
            if (!$this->options->useBoolGetters()) {
                return 'get';
            }
        }

        return $property->getType() === 'bool' ? 'is' : 'get';
    }

    /**
     * Shorten a FQCN into it's short name given a namespace.
     *
     * @param string $type
     *   The FQCN
     * @param null|string $namespace
     *   The namespace
     *
     * @return string
     *   The FQCN shortened
     */
    protected function shortenNamespace(string $type, string $namespace = null)
    {
        $namespace = '\\' . trim($namespace, '\\') . '\\';

        return str_replace($namespace, '', '\\' . ltrim($type, '\\'));
    }
}
