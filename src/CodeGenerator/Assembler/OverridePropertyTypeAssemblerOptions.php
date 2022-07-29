<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Options for OverridePropertyTypeAssembler.
 */
class OverridePropertyTypeAssemblerOptions
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
     * @return OverridePropertyTypeAssemblerOptions
     */
    public function setPropertyTypeMapping(array $propertyMapping): OverridePropertyTypeAssemblerOptions
    {
        $this->propertyMapping = $propertyMapping;

        return $this;
    }
}
