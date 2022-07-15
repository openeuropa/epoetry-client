<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticRequestOut
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
     */
    private $requestReference;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
     */
    private $requestDetails;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\InformativeMessages
     */
    private $informativeMessages;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference
     * @var \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut $requestDetails
     * @var \OpenEuropa\EPoetry\Request\Type\InformativeMessages $informativeMessages
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference, \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut $requestDetails, \OpenEuropa\EPoetry\Request\Type\InformativeMessages $informativeMessages)
    {
        $this->requestReference = $requestReference;
        $this->requestDetails = $requestDetails;
        $this->informativeMessages = $informativeMessages;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference
     * @return $this
     */
    public function setRequestReference($requestReference) : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
     */
    public function getRequestReference() : \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
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
     * @param \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut $requestDetails
     * @return $this
     */
    public function setRequestDetails($requestDetails) : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
     */
    public function getRequestDetails() : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
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

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\InformativeMessages $informativeMessages
     * @return $this
     */
    public function setInformativeMessages($informativeMessages) : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
    {
        $this->informativeMessages = $informativeMessages;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\InformativeMessages
     */
    public function getInformativeMessages() : \OpenEuropa\EPoetry\Request\Type\InformativeMessages
    {
        return $this->informativeMessages;
    }

    /**
     * @return bool
     */
    public function hasInformativeMessages() : bool
    {
        return !empty($this->informativeMessages);
    }
}

