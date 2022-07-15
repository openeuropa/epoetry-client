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
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference
     * @var \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference, \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails)
    {
        $this->requestReference = $requestReference;
        $this->requestDetails = $requestDetails;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference
     * @return $this
     */
    public function setRequestReference($requestReference) : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    public function getRequestReference() : \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
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
    public function setRequestDetails($requestDetails) : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    public function getRequestDetails() : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
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

