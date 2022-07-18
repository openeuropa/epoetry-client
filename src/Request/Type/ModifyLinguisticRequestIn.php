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
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn $requestReference
     * @return $this
     */
    public function setRequestReference(\OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn $requestReference) : \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn
     */
    public function getRequestReference() : \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn
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
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn $requestDetails
     * @return $this
     */
    public function setRequestDetails(\OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn $requestDetails) : \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn
     */
    public function getRequestDetails() : \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn
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

