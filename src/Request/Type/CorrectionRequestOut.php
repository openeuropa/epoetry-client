<?php

namespace OpenEuropa\EPoetry\Request\Type;

class CorrectionRequestOut
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
     */
    private $requestReference = null;

    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\DcoOut
     */
    private $DCO = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference
     * @return $this
     */
    public function setRequestReference(?\OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference) : static
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
     */
    public function getRequestReference() : ?\OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
    {
        return $this->requestReference;
    }

    /**
     * @return bool
     */
    public function hasRequestReference() : bool
    {
        return !empty($this->requestReference);
    }

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\DcoOut $DCO
     * @return $this
     */
    public function setDCO(?\OpenEuropa\EPoetry\Request\Type\DcoOut $DCO) : static
    {
        $this->DCO = $DCO;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\DcoOut
     */
    public function getDCO() : ?\OpenEuropa\EPoetry\Request\Type\DcoOut
    {
        return $this->DCO;
    }

    /**
     * @return bool
     */
    public function hasDCO() : bool
    {
        return !empty($this->DCO);
    }
}

