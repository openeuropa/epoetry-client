<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequestOut
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Language
     */
    private $language;

    /**
     * @var \DateTimeInterface
     */
    private $requestedDeadline;

    /**
     * @var \DateTimeInterface
     */
    private $acceptedDeadline;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ProductStatus
     */
    private $status;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentFormat
     */
    private $format;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Language $language
     * @return $this
     */
    public function setLanguage(\OpenEuropa\EPoetry\Request\Type\Language $language) : static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Language|null
     */
    public function getLanguage() : ?\OpenEuropa\EPoetry\Request\Type\Language
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage() : bool
    {
        return !empty($this->language);
    }

    /**
     * @param \DateTimeInterface $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline(\DateTimeInterface $requestedDeadline) : static
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getRequestedDeadline() : ?\DateTimeInterface
    {
        return $this->requestedDeadline;
    }

    /**
     * @return bool
     */
    public function hasRequestedDeadline() : bool
    {
        return !empty($this->requestedDeadline);
    }

    /**
     * @param \DateTimeInterface $acceptedDeadline
     * @return $this
     */
    public function setAcceptedDeadline(\DateTimeInterface $acceptedDeadline) : static
    {
        $this->acceptedDeadline = $acceptedDeadline;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getAcceptedDeadline() : ?\DateTimeInterface
    {
        return $this->acceptedDeadline;
    }

    /**
     * @return bool
     */
    public function hasAcceptedDeadline() : bool
    {
        return !empty($this->acceptedDeadline);
    }

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges) : static
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isTrackChanges() : ?bool
    {
        return $this->trackChanges;
    }

    /**
     * @return bool
     */
    public function hasTrackChanges() : bool
    {
        return !empty($this->trackChanges);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ProductStatus $status
     * @return $this
     */
    public function setStatus(\OpenEuropa\EPoetry\Request\Type\ProductStatus $status) : static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ProductStatus|null
     */
    public function getStatus() : ?\OpenEuropa\EPoetry\Request\Type\ProductStatus
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function hasStatus() : bool
    {
        return !empty($this->status);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DocumentFormat $format
     * @return $this
     */
    public function setFormat(\OpenEuropa\EPoetry\Request\Type\DocumentFormat $format) : static
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentFormat|null
     */
    public function getFormat() : ?\OpenEuropa\EPoetry\Request\Type\DocumentFormat
    {
        return $this->format;
    }

    /**
     * @return bool
     */
    public function hasFormat() : bool
    {
        return !empty($this->format);
    }
}

