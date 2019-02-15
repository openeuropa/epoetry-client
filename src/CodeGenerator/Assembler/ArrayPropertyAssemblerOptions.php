<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class PropertyAssemblerOptions.
 */
class ArrayPropertyAssemblerOptions extends AbstractAssemblerOptions
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
     * @return ArrayPropertyAssemblerOptions
     */
    public static function create(): ArrayPropertyAssemblerOptions
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
     * @return ArrayPropertyAssemblerOptions
     */
    public function withReturnType(bool $returnType = true): ArrayPropertyAssemblerOptions
    {
        $clone = clone $this;
        $clone->returnType = $returnType;

        return $clone;
    }

    /**
     * @param bool $typeHints
     *
     * @return ArrayPropertyAssemblerOptions
     */
    public function withTypeHints(bool $typeHints = true): ArrayPropertyAssemblerOptions
    {
        $clone = clone $this;
        $clone->typeHints = $typeHints;

        return $clone;
    }
}
