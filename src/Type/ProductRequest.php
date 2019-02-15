<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

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
    protected $formatCode;

    /**
     * @var null|string
     */
    protected $internalProductReference;

    /**
     * @var null|\OpenEuropa\EPoetry\Type\Language
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
     * @return null|\OpenEuropa\EPoetry\Type\Language
     */
    public function getLanguage(): ?\OpenEuropa\EPoetry\Type\Language
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
        if (\is_array($this->acceptedDeadline)) {
            return !empty($this->acceptedDeadline);
        }

        return isset($this->acceptedDeadline);
    }

    /**
     * @return bool
     */
    public function hasFormatCode(): bool
    {
        if (\is_array($this->formatCode)) {
            return !empty($this->formatCode);
        }

        return isset($this->formatCode);
    }

    /**
     * @return bool
     */
    public function hasInternalProductReference(): bool
    {
        if (\is_array($this->internalProductReference)) {
            return !empty($this->internalProductReference);
        }

        return isset($this->internalProductReference);
    }

    /**
     * @return bool
     */
    public function hasLanguage(): bool
    {
        if (\is_array($this->language)) {
            return !empty($this->language);
        }

        return isset($this->language);
    }

    /**
     * @return bool
     */
    public function hasRequestedDeadline(): bool
    {
        if (\is_array($this->requestedDeadline)) {
            return !empty($this->requestedDeadline);
        }

        return isset($this->requestedDeadline);
    }

    /**
     * @return bool
     */
    public function hasStatusCode(): bool
    {
        if (\is_array($this->statusCode)) {
            return !empty($this->statusCode);
        }

        return isset($this->statusCode);
    }

    /**
     * @return bool
     */
    public function hasTrackChanges(): bool
    {
        if (\is_array($this->trackChanges)) {
            return !empty($this->trackChanges);
        }

        return isset($this->trackChanges);
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
     * @param \OpenEuropa\EPoetry\Type\Language $language
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
