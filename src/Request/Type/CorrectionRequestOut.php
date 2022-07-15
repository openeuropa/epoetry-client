<?php

namespace OpenEuropa\EPoetry\Request\Type;

class CorrectionRequestOut
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
     */
    private $requestReference;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\DcoOut
     */
    private $DCO;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference
     * @var \OpenEuropa\EPoetry\Request\Type\DcoOut $DCO
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference, \OpenEuropa\EPoetry\Request\Type\DcoOut $DCO)
    {
        $this->requestReference = $requestReference;
        $this->DCO = $DCO;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference
     * @return $this
     */
    public function setRequestReference($requestReference) : \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut|null
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
     * @param \OpenEuropa\EPoetry\Request\Type\DcoOut $DCO
     * @return $this
     */
    public function setDCO($DCO) : \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut
    {
        $this->DCO = $DCO;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DcoOut|null
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

