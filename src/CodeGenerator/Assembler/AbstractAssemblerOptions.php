<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\CodeGenerator\Assembler;

/**
 * Class AbstractAssemblerOptions.
 *
 * Base class for all the custom assemblers options used by custom assemblers.
 */
abstract class AbstractAssemblerOptions
{
    /**
     * @var array
     */
    protected $blacklist;
    /**
     * @var array
     */
    protected $whitelist;

    /**
     * @param array $blacklist
     *
     * @return \OpenEuropa\EPoetry\CodeGenerator\Assembler\AbstractAssemblerOptions
     */
    public function blacklist(array $blacklist): AbstractAssemblerOptions
    {
        $this->blacklist = $blacklist;

        return $this;
    }

    /**
     * @param string $className
     * @param null|string $propertyName
     *
     * @return bool
     */
    public function isBlacklisted(string $className, string $propertyName = null): bool
    {
        if ($this->blacklist === null) {
            return false;
        }

        if ($propertyName === null) {
            return isset($this->blacklist[$className]);
        }

        return isset($this->blacklist[$className]) && \in_array($propertyName, $this->blacklist[$className], true);
    }

    /**
     * @param string $className
     * @param null|string $propertyName
     *
     * @return bool
     */
    public function isWhitelisted(string $className, string $propertyName = null): bool
    {
        if ($this->whitelist === null) {
            return true;
        }

        if ($propertyName === null) {
            return isset($this->whitelist[$className]);
        }

        return isset($this->whitelist[$className]) && \in_array($propertyName, $this->whitelist[$className], true);
    }

    /**
     * @param array $whitelist
     *
     * @return \OpenEuropa\EPoetry\CodeGenerator\Assembler\AbstractAssemblerOptions
     */
    public function whitelist(array $whitelist): AbstractAssemblerOptions
    {
        $this->whitelist = $whitelist;

        return $this;
    }
}
