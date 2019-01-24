<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class ProductRequestIn
{
    /**
     * @var string
     */
    private $internalProductReference;

    /**
     * @var \OpenEuropa\EPoetry\Type\LanguageIn
     */
    private $language;

    /**
     * @var \DateTime
     */
    private $requestedDeadline;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @return string
     */
    public function getInternalProductReference(): string
    {
        return $this->internalProductReference;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\LanguageIn
     */
    public function getLanguage(): LanguageIn
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
     * @return bool
     */
    public function isTrackChanges(): bool
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
     * @param \OpenEuropa\EPoetry\Type\LanguageIn $language
     *
     * @return $this
     */
    public function setLanguage($language): ProductRequestIn
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @param \DateTime $requestedDeadline
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
