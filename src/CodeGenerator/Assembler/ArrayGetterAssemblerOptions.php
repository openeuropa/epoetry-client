<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class ArrayGetterAssemblerOptions.
 */
class ArrayGetterAssemblerOptions extends AbstractAssemblerOptions
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
     * @return ArrayGetterAssemblerOptions
     */
    public static function create(): ArrayGetterAssemblerOptions
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
     * @return ArrayGetterAssemblerOptions
     */
    public function withReturnType(bool $returnType = true): ArrayGetterAssemblerOptions
    {
        $clone = clone $this;
        $clone->returnType = $returnType;

        return $clone;
    }

    /**
     * @param bool $typeHints
     *
     * @return ArrayGetterAssemblerOptions
     */
    public function withTypeHints(bool $typeHints = true): ArrayGetterAssemblerOptions
    {
        $clone = clone $this;
        $clone->typeHints = $typeHints;

        return $clone;
    }
}
