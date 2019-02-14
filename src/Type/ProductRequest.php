<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ProductRequest implements RequestInterface
{
    /**
     * @var \DateTime
     */
    protected $acceptedDeadline;

    /**
     * @var string
     */
    protected $formatCode;

    /**
     * @var string
     */
    protected $internalProductReference;

    /**
     * @var \OpenEuropa\EPoetry\Type\Language
     */
    protected $language;

    /**
     * @var \DateTime
     */
    protected $requestedDeadline;

    /**
     * @var string
     */
    protected $statusCode;

    /**
     * @var bool
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
