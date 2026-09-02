<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class UpdateCallbackUrl implements RequestInterface
{
    /**
     * @var null | string
     */
    private $callbackUrl = null;

    /**
     * @var null | string
     */
    private $applicationName = null;

    /**
     * @param null | string $callbackUrl
     * @return $this
     */
    public function setCallbackUrl(?string $callbackUrl): static
    {
        $this->callbackUrl = $callbackUrl;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }

    /**
     * @return bool
     */
    public function hasCallbackUrl(): bool
    {
        return !empty($this->callbackUrl);
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

