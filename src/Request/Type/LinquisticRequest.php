<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinquisticRequest
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
     */
    private $requestReference = null;

    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
     */
    private $requestDetails = null;

    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\InformativeMessages
     */
    private $informativeMessages = null;

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
     * @param null | \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut $requestDetails
     * @return $this
     */
    public function setRequestDetails(?\OpenEuropa\EPoetry\Request\Type\RequestDetailsOut $requestDetails) : static
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
     */
    public function getRequestDetails() : ?\OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
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
     * @param null | \OpenEuropa\EPoetry\Request\Type\InformativeMessages $informativeMessages
     * @return $this
     */
    public function setInformativeMessages(?\OpenEuropa\EPoetry\Request\Type\InformativeMessages $informativeMessages) : static
    {
        $this->informativeMessages = $informativeMessages;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\InformativeMessages
     */
    public function getInformativeMessages() : ?\OpenEuropa\EPoetry\Request\Type\InformativeMessages
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

