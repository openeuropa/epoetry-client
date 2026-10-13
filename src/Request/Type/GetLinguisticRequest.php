<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetLinguisticRequest implements RequestInterface
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    private $requestReference = null;

    /**
     * @var null | string
     */
    private $applicationName = null;

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
     * @param null | string $applicationName
     * @return $this
     */
    public function setApplicationName(?string $applicationName): static
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getApplicationName(): ?string
    {
        return $this->applicationName;
    }

    /**
     * @return bool
     */
    public function hasApplicationName(): bool
    {
        return !empty($this->applicationName);
    }
}

