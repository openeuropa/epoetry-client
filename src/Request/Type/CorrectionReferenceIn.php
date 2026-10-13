<?php

namespace OpenEuropa\EPoetry\Request\Type;

class CorrectionReferenceIn
{
    /**
     * @var null | int
     */
    private $version = null;

    /**
     * @param null | int $version
     * @return $this
     */
    public function setVersion(?int $version): static
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return null | int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @return bool
     */
    public function hasVersion(): bool
    {
        return !empty($this->version);
    }
}

