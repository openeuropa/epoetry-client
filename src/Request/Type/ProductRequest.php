<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequest
{
    /**
     * @var null|\DateTime
     */
    protected $acceptedDeadline;

    /**
     * @var null|string
     */
    protected $formatCode;

    /**
     * @var null|string
     */
    protected $internalProductReference;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\Language
     */
    protected $language;

    /**
     * @var null|\DateTime
     */
    protected $requestedDeadline;

    /**
     * @var null|string
     */
    protected $statusCode;

    /**
     * @var null|bool
     */
    protected $trackChanges;

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
    public function getFormatCode(): ?string
    {
        return $this->formatCode;
    }

    /**
     * @return null|string
     */
    public function getInternalProductReference(): ?string
    {
        return $this->internalProductReference;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\Language
     */
    public function getLanguage(): ?Language
    {
        return $this->language;
    }

    /**
     * @return null|\DateTime
     */
    public function getRequestedDeadline(): ?\DateTime
    {
        return $this->requestedDeadline;
    }

    /**
     * @return null|string
     */
    public function getStatusCode(): ?string
    {
        return $this->statusCode;
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
    public function hasFormatCode(): bool
    {
        return !empty($this->formatCode);
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
     * @return bool
     */
    public function hasRequestedDeadline(): bool
    {
        return !empty($this->requestedDeadline);
    }

    /**
     * @return bool
     */
    public function hasStatusCode(): bool
    {
        return !empty($this->statusCode);
    }

    /**
     * @return bool
     */
    public function hasTrackChanges(): bool
    {
        return !empty($this->trackChanges);
    }

    /**
     * @return null|bool
     */
    public function isTrackChanges(): ?bool
    {
        return $this->trackChanges;
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
     * @param string $formatCode
     *
     * @return $this
     */
    public function setFormatCode(string $formatCode): ProductRequest
    {
        $this->formatCode = $formatCode;

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
     * @param \OpenEuropa\EPoetry\Request\Type\Language $language
     *
     * @return $this
     */
    public function setLanguage($language): ProductRequest
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @param \DateTime $requestedDeadline
     *
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline): ProductRequest
    {
        $this->requestedDeadline = $requestedDeadline;

        return $this;
    }

    /**
     * @param string $statusCode
     *
     * @return $this
     */
    public function setStatusCode(string $statusCode): ProductRequest
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param bool $trackChanges
     *
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges): ProductRequest
    {
        $this->trackChanges = $trackChanges;

        return $this;
    }
}
