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
     * @return \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference
     * @return LinguisticRequestIn
     */
    public function withRequestReference($requestReference)
    {
        $new = clone $this;
        $new->requestReference = $requestReference;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    public function getRequestDetails()
    {
        return $this->requestDetails;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @return LinguisticRequestIn
     */
    public function withRequestDetails($requestDetails)
    {
        $new = clone $this;
        $new->requestDetails = $requestDetails;

        return $new;
    }
}

