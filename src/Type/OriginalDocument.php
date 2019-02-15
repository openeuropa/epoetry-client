<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class OriginalDocument extends DgtDocument
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\LinguisticSections
     */
    protected $linguisticSections;

    /**
     * @var null|float
     */
    protected $pages;

    /**
     * @var null|bool
     */
    protected $trackChanges;

    /**
     * @return null|\OpenEuropa\EPoetry\Type\LinguisticSections
     */
    public function getLinguisticSections(): ?\OpenEuropa\EPoetry\Type\LinguisticSections
    {
        return $this->linguisticSections;
    }

    /**
     * @return null|float
     */
    public function getPages(): ?float
    {
        return $this->pages;
    }

    /**
     * @return bool
     */
    public function hasLinguisticSections(): bool
    {
        if (\is_array($this->linguisticSections)) {
            return !empty($this->linguisticSections);
        }

        return isset($this->linguisticSections);
    }

    /**
     * @return bool
     */
    public function hasPages(): bool
    {
        if (\is_array($this->pages)) {
            return !empty($this->pages);
        }

        return isset($this->pages);
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
     * @param \OpenEuropa\EPoetry\Type\LinguisticSections $linguisticSections
     *
     * @return $this
     */
    public function setLinguisticSections($linguisticSections): OriginalDocument
    {
        $this->linguisticSections = $linguisticSections;

        return $this;
    }

    /**
     * @param float $pages
     *
     * @return $this
     */
    public function setPages(float $pages): OriginalDocument
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @param bool $trackChanges
     *
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges): OriginalDocument
    {
        $this->trackChanges = $trackChanges;

        return $this;
    }
}
