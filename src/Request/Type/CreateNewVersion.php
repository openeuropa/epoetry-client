<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateNewVersion implements RequestInterface
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    private $linguisticRequest = null;

    /**
     * @var null | string
     */
    private $applicationName = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $linguisticRequest
     * @return $this
     */
    public function setLinguisticRequest(?\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $linguisticRequest): static
    {
        $this->linguisticRequest = $linguisticRequest;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    public function getLinguisticRequest(): ?\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
    {
        return $this->linguisticRequest;
    }

    /**
     * @return bool
     */
    public function hasLinguisticRequest(): bool
    {
        return !empty($this->linguisticRequest);
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

