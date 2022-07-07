<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ModifyLinguisticRequestIn
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn
     */
    private $requestReference;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn
     */
    private $requestDetails;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn $requestReference
     * @return $this
     */
    public function setRequestReference($requestReference) : \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn|null
     */
    public function getRequestReference() : ?\OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn
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
    public function setRequestDetails($requestDetails) : \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn|null
     */
    public function getRequestDetails() : ?\OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn
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

