<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class AbstractAssemblerOptions.
 */
abstract class AbstractAssemblerOptions
{
    /**
     * @var array
     */
    protected $filter;

    /**
     * @param array $filters
     */
    public function filterBy(array $filters)
    {
        $this->filter = $filters;

        return $this;
    }

    /**
     * @param string $className
     * @param string $propertyName
     *
     * @return bool
     */
    public function isFiltered(string $className, string $propertyName): bool
    {
        return isset($this->filter[$className]) && \in_array($propertyName, $this->filter[$className], true);
    }
}
