<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ModifyProductRequestIn
{
    /**
     * @var null|string
     */
    private $language;

    /**
     * @var null|\DateTimeInterface
     */
    private $requestedDeadline;

    /**
     * @var null|bool
     */
    private $trackChanges;

    /**
     * Constructor
     *
     * @var string $language
     * @var \DateTimeInterface $requestedDeadline
     * @var bool $trackChanges
     */
    public function __construct(string $language, \DateTimeInterface $requestedDeadline, bool $trackChanges)
    {
        $this->language = $language;
        $this->requestedDeadline = $requestedDeadline;
        $this->trackChanges = $trackChanges;
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language) : \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn
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
     * @param \DateTimeInterface $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline) : \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn
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
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges) : \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn
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

