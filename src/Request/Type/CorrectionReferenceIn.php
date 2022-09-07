<?php

namespace OpenEuropa\EPoetry\Request\Type;

class CorrectionReferenceIn
{
    /**
     * @var int
     */
    private $version;

    /**
     * @param int $version
     * @return $this
     */
    public function setVersion(int $version) : \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVersion() : ?int
    {
        return $this->version;
    }

    /**
     * @return bool
     */
    public function hasVersion() : bool
    {
        return !empty($this->version);
    }
}

