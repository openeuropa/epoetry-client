<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequestIn
{
    /**
     * @var string
     */
    private $language;

    /**
     * @var null | \DateTimeInterface
     */
    private $requestedDeadline = null;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language): static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage(): string
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

    /**
     * @param null | \DateTimeInterface $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline(?\DateTimeInterface $requestedDeadline): static
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return null | \DateTimeInterface
     */
    public function getRequestedDeadline(): ?\DateTimeInterface
    {
        return $this->requestedDeadline;
    }

    /**
     * @return bool
     */
    public function hasRequestedDeadline(): bool
    {
        return !empty($this->requestedDeadline);
    }

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges): static
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTrackChanges(): bool
    {
        return $this->trackChanges;
    }

    /**
     * @return bool
     */
    public function hasTrackChanges(): bool
    {
        return !empty($this->trackChanges);
    }
}

