<?php

namespace OpenEuropa\EPoetry\Request\Type;

class CorrectionReferenceIn
{
    /**
     * @var int
     */
    private $version;

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return CorrectionReferenceIn
     */
    public function withVersion($version)
    {
        $new = clone $this;
        $new->version = $version;

        return $new;
    }
}

