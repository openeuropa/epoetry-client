<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class NullableGetterAssemblerOptions.
 */
class NullableGetterAssemblerOptions extends AbstractAssemblerOptions
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
     * @return NullableGetterAssemblerOptions
     */
    public static function create(): NullableGetterAssemblerOptions
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
     * @return NullableGetterAssemblerOptions
     */
    public function withReturnType(bool $returnType = true): NullableGetterAssemblerOptions
    {
        $clone = clone $this;
        $clone->returnType = $returnType;

        return $clone;
    }

    /**
     * @param bool $typeHints
     *
     * @return NullableGetterAssemblerOptions
     */
    public function withTypeHints(bool $typeHints = true): NullableGetterAssemblerOptions
    {
        $clone = clone $this;
        $clone->typeHints = $typeHints;

        return $clone;
    }
}
