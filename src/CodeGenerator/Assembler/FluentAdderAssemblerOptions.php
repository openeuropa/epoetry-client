<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class FluentAdderAssemblerOptions.
 */
class FluentAdderAssemblerOptions
{
    /**
     * @var array
     */
    private $properties = [];

    /**
     * @var bool
     */
    private $returnType = false;

    /**
     * @var bool
     */
    private $typeHints = false;

    /**
     * @var bool
     */
    private $typeInterfaceReplacement = false;

    /**
     * @return FluentAdderAssemblerOptions
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param string $className
     * @param string $propertyName
     *
     * @return \OpenEuropa\EPoetry\CodeGenerator\Assembler\FluentAdderAssemblerOptions
     */
    public function generateAdderForProperty(string $className, string $propertyName): self
    {
        $this->properties[$className][] = $propertyName;

        return $this;
    }

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return $this->properties;
    }

    /**
     * @param string $name
     * @param string $property
     *
     * @return bool
     */
    public function hasProperty(string $name, string $property): bool
    {
        return isset($this->properties[$name]) && \in_array($property, $this->properties[$name], true);
    }

    /**
     * @return bool
     */
    public function useReturnType(): bool
    {
        return $this->returnType;
    }

    /**
     * @return bool
     */
    public function useTypeHints(): bool
    {
        return $this->typeHints;
    }

    /**
     * @return bool
     */
    public function useTypeInterfaceReplacement(): bool
    {
        return $this->typeInterfaceReplacement;
    }

    /**
     * @param bool $returnType
     *
     * @return FluentAdderAssemblerOptions
     */
    public function withReturnType(bool $returnType = true): self
    {
        $this->returnType = $returnType;

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

    /**
     * @param bool $typeInterfaceReplacement
     *
     * @return FluentAdderAssemblerOptions
     */
    public function withTypeInterfaceReplacement(bool $typeInterfaceReplacement = true): self
    {
        $this->typeInterfaceReplacement = $typeInterfaceReplacement;

        return $this;
    }
}
