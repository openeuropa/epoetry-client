<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequestIn
{
    /**
     * @var null|string
     */
    protected $internalProductReference;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\LanguageIn
     */
    protected $language;

    /**
     * @var null|\DateTimeInterface
     */
    protected $requestedDeadline;

    /**
     * @var null|bool
     */
    protected $trackChanges;

    /**
     * @return null|string
     */
    public function getInternalProductReference(): ?string
    {
        return $this->internalProductReference;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\LanguageIn
     */
    public function getLanguage(): ?LanguageIn
    {
        return $this->language;
    }

    /**
     * @return null|\DateTimeInterface
     */
    public function getRequestedDeadline(): ?\DateTimeInterface
    {
        return $this->requestedDeadline;
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
     * @param string $internalProductReference
     *
     * @return $this
     */
    public function setInternalProductReference(string $internalProductReference): ProductRequestIn
    {
        $this->internalProductReference = $internalProductReference;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LanguageIn $language
     *
     * @return $this
     */
    public function setLanguage($language): ProductRequestIn
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @param \DateTimeInterface $requestedDeadline
     *
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline): ProductRequestIn
    {
        $this->requestedDeadline = $requestedDeadline;

        return $this;
    }

    /**
     * @param bool $trackChanges
     *
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges): ProductRequestIn
    {
        $this->trackChanges = $trackChanges;

        return $this;
    }
}
