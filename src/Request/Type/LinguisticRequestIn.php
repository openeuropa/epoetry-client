<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticRequestIn
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    private $requestReference = null;

    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    private $requestDetails = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference
     * @return $this
     */
    public function setRequestReference(?\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference): static
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    public function getRequestReference(): ?\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
    {
        return $this->requestReference;
    }

    /**
     * @return bool
     */
    public function hasRequestReference(): bool
    {
        return !empty($this->requestReference);
    }

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @return $this
     */
    public function setRequestDetails(?\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails): static
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    public function getRequestDetails(): ?\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        return $this->requestDetails;
    }

    /**
     * @return bool
     */
    public function hasRequestDetails(): bool
    {
        return !empty($this->requestDetails);
    }
}

