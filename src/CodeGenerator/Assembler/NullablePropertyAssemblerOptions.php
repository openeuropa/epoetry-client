<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class NullablePropertyAssemblerOptions.
 *
 * Custom assemblers options used by the custom NullablePropertyAssembler.
 */
class NullablePropertyAssemblerOptions extends AbstractAssemblerOptions
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
     * @return NullablePropertyAssemblerOptions
     */
    public static function create(): NullablePropertyAssemblerOptions
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
     * @return NullablePropertyAssemblerOptions
     */
    public function withReturnType(bool $returnType = true): NullablePropertyAssemblerOptions
    {
        $clone = clone $this;
        $clone->returnType = $returnType;

        return $clone;
    }

    /**
     * @param bool $typeHints
     *
     * @return NullablePropertyAssemblerOptions
     */
    public function withTypeHints(bool $typeHints = true): NullablePropertyAssemblerOptions
    {
        $clone = clone $this;
        $clone->typeHints = $typeHints;

        return $clone;
    }
}
