<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class ProductReference
{
    /**
     * @var null | \OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    private $requestReference = null;

    /**
     * @var null | string
     */
    private $language = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference
     * @return $this
     */
    public function setRequestReference(?\OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference): static
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    public function getRequestReference(): ?\OpenEuropa\EPoetry\Notification\Type\RequestReference
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
     * @param null | string $language
     * @return $this
     */
    public function setLanguage(?string $language): static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage(): bool
    {
        return !empty($this->language);
    }
}

