<?php

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class FluentAdderAssemblerOptions
 */
class FluentAdderAssemblerOptions
{
    /**
     * @var bool
     */
    private $typeHints = false;

    private $properties = [];

    /**
     * @return FluentAdderAssemblerOptions
     */
    public static function create(): FluentAdderAssemblerOptions
    {
        return new self();
    }

    /**
     * @param bool $typeHints
     *
     * @return FluentAdderAssemblerOptions
     */
    public function withTypeHints(bool $typeHints = true): FluentAdderAssemblerOptions
    {
        $this->typeHints = $typeHints;

        return $this;
    }

    /**
     * @return bool
     */
    public function useTypeHints(): bool
    {
        return $this->typeHints;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function withProperties(array $properties)
    {
        $this->properties = $properties;
        return $this;
    }

    public function hasProperty(string $name, string $property): bool
    {
        return isset($this->properties[$name]) && in_array($property, $this->properties[$name]);
    }
}
