<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class ArraySetterAssemblerOptions.
 */
class ArraySetterAssemblerOptions extends AbstractAssemblerOptions
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
     * @return ArraySetterAssemblerOptions
     */
    public static function create(): ArraySetterAssemblerOptions
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
     * @return ArraySetterAssemblerOptions
     */
    public function withReturnType(bool $returnType = true): ArraySetterAssemblerOptions
    {
        $clone = clone $this;
        $clone->returnType = $returnType;

        return $clone;
    }

    /**
     * @param bool $typeHints
     *
     * @return ArraySetterAssemblerOptions
     */
    public function withTypeHints(bool $typeHints = true): ArraySetterAssemblerOptions
    {
        $clone = clone $this;
        $clone->typeHints = $typeHints;

        return $clone;
    }
}
