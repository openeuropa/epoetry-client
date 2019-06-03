<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Custom assemblers options used by the custom OverrideTypeAssembler.
 */
class OverrideTypeAssemblerOptions
{
    /**
     * @var array
     */
    private $propertyMapping = [];

    /**
     * @param string $className
     * @param string $propertyName
     *
     * @return string
     */
    public function getPropertyType(string $className, string $propertyName): string
    {
        return $this->propertyMapping[$className][$propertyName];
    }

    /**
     * @param string $className
     * @param string $propertyName
     *
     * @return bool
     */
    public function hasPropertyTypeOverride(string $className, string $propertyName): bool
    {
        return isset($this->propertyMapping[$className][$propertyName]);
    }

    /**
     * @param array $propertyMapping
     *
     * @return OverrideTypeAssemblerOptions
     */
    public function setPropertyTypeMapping(array $propertyMapping): OverrideTypeAssemblerOptions
    {
        $this->propertyMapping = $propertyMapping;

        return $this;
    }
}
