<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ProductRequest implements RequestInterface
{
    /**
     * @var \DateTime
     */
    private $acceptedDeadline;

    /**
     * @var string
     */
    private $formatCode;

    /**
     * @var string
     */
    private $internalProductReference;

    /**
     * @var \OpenEuropa\EPoetry\Type\Language
     */
    private $language;

    /**
     * @var \DateTime
     */
    private $requestedDeadline;

    /**
     * @var string
     */
    private $statusCode;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @return \DateTime
     */
    public function getAcceptedDeadline(): \DateTime
    {
        return $this->acceptedDeadline;
    }

    /**
     * @return string
     */
    public function getFormatCode(): string
    {
        return $this->formatCode;
    }

    /**
     * @return string
     */
    public function getInternalProductReference(): string
    {
        return $this->internalProductReference;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\Language
     */
    public function getLanguage(): Language
    {
        return $this->language;
    }

    /**
     * @return \DateTime
     */
    public function getRequestedDeadline(): \DateTime
    {
        return $this->requestedDeadline;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    /**
     * @return bool
     */
    public function isTrackChanges(): bool
    {
        return $this->trackChanges;
    }

    /**
     * @param \DateTime $acceptedDeadline
     *
     * @return $this
     */
    public function setAcceptedDeadline($acceptedDeadline): self
    {
        $this->acceptedDeadline = $acceptedDeadline;

        return $this;
    }

    /**
     * @param string $formatCode
     *
     * @return $this
     */
    public function setFormatCode(string $formatCode): self
    {
        $this->formatCode = $formatCode;

        return $this;
    }

    /**
     * @param string $internalProductReference
     *
     * @return $this
     */
    public function setInternalProductReference(string $internalProductReference): self
    {
        $this->internalProductReference = $internalProductReference;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\Language $language
     *
     * @return $this
     */
    public function setLanguage($language): self
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @param \DateTime $requestedDeadline
     *
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline): self
    {
        $this->requestedDeadline = $requestedDeadline;

        return $this;
    }

    /**
     * @param string $statusCode
     *
     * @return $this
     */
    public function setStatusCode(string $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * @param bool $trackChanges
     *
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges): self
    {
        $this->trackChanges = $trackChanges;

        return $this;
    }
}
