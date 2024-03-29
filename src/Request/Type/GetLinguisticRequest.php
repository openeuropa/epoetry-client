<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetLinguisticRequest implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    private $requestReference;

    /**
     * @var string
     */
    private $applicationName;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference
     * @return $this
     */
    public function setRequestReference(\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference) : \OpenEuropa\EPoetry\Request\Type\GetLinguisticRequest
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
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName) : \OpenEuropa\EPoetry\Request\Type\GetLinguisticRequest
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApplicationName() : ?string
    {
        return $this->applicationName;
    }

    /**
     * @return bool
     */
    public function hasApplicationName() : bool
    {
        return !empty($this->applicationName);
    }
}

