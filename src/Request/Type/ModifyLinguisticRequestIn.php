<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ModifyLinguisticRequestIn
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn
     */
    private $requestReference;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn
     */
    private $requestDetails;

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn $requestReference
     * @return ModifyLinguisticRequestIn
     */
    public function withRequestReference($requestReference)
    {
        $new = clone $this;
        $new->requestReference = $requestReference;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn
     */
    public function getRequestDetails()
    {
        return $this->requestDetails;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn $requestDetails
     * @return ModifyLinguisticRequestIn
     */
    public function withRequestDetails($requestDetails)
    {
        $new = clone $this;
        $new->requestDetails = $requestDetails;

        return $new;
    }
}

