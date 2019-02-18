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
     * @var \OpenEuropa\EPoetry\CodeGenerator\Assembler\AbstractAssemblerOptions
     */
    protected $options;

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

        $isWhitelisted = $this->options->isWhitelisted(
            $class->getName(),
            $property->getName()
        );

        $isBlacklisted = $this->options->isBlacklisted(
            $class->getName(),
            $property->getName()
        );

        return $isWhitelisted && !$isBlacklisted;
    }

    /**
     * @param Property $property
     *
     * @return string
     */
    protected function getPrefix(Property $property): string
    {
        if (isset($this->options)) {
            if (method_exists($this->options, 'useBoolGetters')) {
                if (!$this->options->useBoolGetters()) {
                    return 'get';
                }
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

        return trim(str_replace($namespace, '', '\\' . ltrim($type, '\\')), '\\');
    }
}
