<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticRequestIn
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    private $requestReference;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    private $requestDetails;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference
     * @return $this
     */
    public function setRequestReference(\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference) : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn|null
     */
    public function getRequestReference() : ?\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
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
     * @param \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @return $this
     */
    public function setRequestDetails(\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails) : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn|null
     */
    public function getRequestDetails() : ?\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        return $this->requestDetails;
    }

    /**
     * @return bool
     */
    public function hasRequestDetails() : bool
    {
        return !empty($this->requestDetails);
    }
}

