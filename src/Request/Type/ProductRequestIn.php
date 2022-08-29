<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequestIn
{
    /**
     * @var string
     */
    private $language;

    /**
     * @var \DateTimeInterface
     */
    private $requestedDeadline;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @param string|null $language
     * @return $this
     */
    public function setLanguage(?string $language) : \OpenEuropa\EPoetry\Request\Type\ProductRequestIn
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage() : ?string
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
     * @param \DateTimeInterface|null $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline(?\DateTimeInterface $requestedDeadline) : \OpenEuropa\EPoetry\Request\Type\ProductRequestIn
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
     * @param bool|null $trackChanges
     * @return $this
     */
    public function setTrackChanges(?bool $trackChanges) : \OpenEuropa\EPoetry\Request\Type\ProductRequestIn
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
}

