<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class InterfaceReplacementAssemblerOptions.
 */
class InterfaceReplacementAssemblerOptions
{
    /**
     * @var bool
     */
    private $returnType = false;

    /**
     * @var bool
     */
    private $typeHints = false;

    /**
     * @return InterfaceReplacementAssemblerOptions
     */
    public static function create(): self
    {
        return new self();
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
     * @param bool $returnType
     *
     * @return InterfaceReplacementAssemblerOptions
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
}
