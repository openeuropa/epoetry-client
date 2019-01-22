<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class FluentAdderAssemblerOptions.
 */
class FluentAdderAssemblerOptions
{
    private $properties = [];

    /**
     * @var bool
     */
    private $typeHints = false;

    /**
     * @return FluentAdderAssemblerOptions
     */
    public static function create(): self
    {
        return new self();
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function hasProperty(string $name, string $property): bool
    {
        return isset($this->properties[$name]) && \in_array($property, $this->properties[$name], true);
    }

    /**
     * @return bool
     */
    public function useTypeHints(): bool
    {
        return $this->typeHints;
    }

    public function withProperties(array $properties)
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * @param bool $typeHints
     *
     * @return FluentAdderAssemblerOptions
     */
    public function withTypeHints(bool $typeHints = true): self
    {
        $this->typeHints = $typeHints;

        return $this;
    }
}
