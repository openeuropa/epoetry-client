<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ProductRequest implements RequestInterface
{
    /**
     * @var null|\DateTime
     */
    protected $acceptedDeadline;

    /**
     * @var null|string
     */
    protected $internalProductReference;

    /**
     * @var null|\OpenEuropa\EPoetry\Notification\Type\Language
     */
    protected $language;

    /**
     * @return null|\DateTime
     */
    public function getAcceptedDeadline(): ?\DateTime
    {
        return $this->acceptedDeadline;
    }

    /**
     * @return null|string
     */
    public function getInternalProductReference(): ?string
    {
        return $this->internalProductReference;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Notification\Type\Language
     */
    public function getLanguage(): ?\OpenEuropa\EPoetry\Notification\Type\Language
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasAcceptedDeadline(): bool
    {
        return !empty($this->acceptedDeadline);
    }

    /**
     * @return bool
     */
    public function hasInternalProductReference(): bool
    {
        return !empty($this->internalProductReference);
    }

    /**
     * @return bool
     */
    public function hasLanguage(): bool
    {
        return !empty($this->language);
    }

    /**
     * @param \DateTime $acceptedDeadline
     *
     * @return $this
     */
    public function setAcceptedDeadline($acceptedDeadline): ProductRequest
    {
        $this->acceptedDeadline = $acceptedDeadline;

        return $this;
    }

    /**
     * @param string $internalProductReference
     *
     * @return $this
     */
    public function setInternalProductReference(string $internalProductReference): ProductRequest
    {
        $this->internalProductReference = $internalProductReference;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Language $language
     *
     * @return $this
     */
    public function setLanguage($language): ProductRequest
    {
        $this->language = $language;

        return $this;
    }
}
