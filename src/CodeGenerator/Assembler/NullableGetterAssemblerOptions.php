<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

use Phpro\SoapClient\CodeGenerator\Assembler\GetterAssemblerOptions;

/**
 * Class NullableGetterAssemblerOptions
 *
 * @see GetterAssemblerOptions
 */
class NullableGetterAssemblerOptions
{
    /**
     * @var bool
     */
    private $boolGetters = false;

    /**
     * @var bool
     */
    private $returnType = true;

    /**
     * @var bool
     */
    private $docBlocks = true;

    /**
     * @var bool
     */
    private bool $returnNull = false;

    private bool $optionalValue = false;

    /**
     * @return NullableGetterAssemblerOptions
     */
    public static function create(): NullableGetterAssemblerOptions
    {
        return new self();
    }

    /**
     * @param bool $boolGetters
     *
     * @return NullableGetterAssemblerOptions
     */
    public function withBoolGetters(bool $boolGetters = true): NullableGetterAssemblerOptions
    {
        $new = clone $this;
        $new->boolGetters = $boolGetters;

        return $new;
    }

    /**
     * @param bool $returnType
     *
     * @return NullableGetterAssemblerOptions
     */
    public function withReturnType(bool $returnType = true): NullableGetterAssemblerOptions
    {
        $new = clone $this;
        $new->returnType = $returnType;

        return $new;
    }

    /**
     * @return bool
     */
    public function useBoolGetters(): bool
    {
        return $this->boolGetters;
    }

    /**
     * @return bool
     */
    public function useReturnType(): bool
    {
        return $this->returnType;
    }

    /**
     * @param bool $withDocBlocks
     *
     * @return NullableGetterAssemblerOptions
     */
    public function withDocBlocks(bool $withDocBlocks = true): NullableGetterAssemblerOptions
    {
        $new = clone $this;
        $new->docBlocks = $withDocBlocks;

        return $new;
    }

    /**
     * @return bool
     */
    public function useDocBlocks(): bool
    {
        return $this->docBlocks;
    }

    public function withOptionalValue(bool $withOptionalValue = true): self
    {
        $new = clone $this;
        $new->optionalValue = $withOptionalValue;

        return $new;
    }

    public function useOptionalValue(): bool
    {
        return $this->optionalValue;
    }

    /**
     * @param bool $returnNull
     *
     * @return self
     */
    public function withReturnNull(bool $returnNull = true): self
    {
        $new = clone $this;
        $new->returnNull = $returnNull;

        return $new;
    }

    /**
     * @return bool
     */
    public function useReturnNull(): bool
    {
        return $this->returnNull;
    }
}
