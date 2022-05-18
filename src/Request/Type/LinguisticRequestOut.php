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
     * @return \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference
     * @return LinguisticRequestOut
     */
    public function withRequestReference($requestReference)
    {
        $new = clone $this;
        $new->requestReference = $requestReference;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
     */
    public function getRequestDetails()
    {
        return $this->requestDetails;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut $requestDetails
     * @return LinguisticRequestOut
     */
    public function withRequestDetails($requestDetails)
    {
        $new = clone $this;
        $new->requestDetails = $requestDetails;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\InformativeMessages
     */
    public function getInformativeMessages()
    {
        return $this->informativeMessages;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\InformativeMessages $informativeMessages
     * @return LinguisticRequestOut
     */
    public function withInformativeMessages($informativeMessages)
    {
        $new = clone $this;
        $new->informativeMessages = $informativeMessages;

        return $new;
    }
}

