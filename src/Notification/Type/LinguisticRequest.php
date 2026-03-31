<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class LinguisticRequest
{
    /**
     * @var null | \OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    private $requestReference = null;

    /**
     * @var null | string
     */
    private $status = null;

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
     * @param null | string $status
     * @return $this
     */
    public function setStatus(?string $status): static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function hasStatus(): bool
    {
        return !empty($this->status);
    }
}

