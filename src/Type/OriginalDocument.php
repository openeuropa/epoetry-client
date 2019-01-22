<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class OriginalDocument extends DgtDocument
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticSections
     */
    private $linguisticSections;

    /**
     * @var float
     */
    private $pages;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticSections
     */
    public function getLinguisticSections(): LinguisticSections
    {
        return $this->linguisticSections;
    }

    /**
     * @return float
     */
    public function getPages(): float
    {
        return $this->pages;
    }

    /**
     * @return bool
     */
    public function isTrackChanges(): bool
    {
        return $this->trackChanges;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticSections $linguisticSections
     *
     * @return $this
     */
    public function setLinguisticSections($linguisticSections): self
    {
        $this->linguisticSections = $linguisticSections;

        return $this;
    }

    /**
     * @param float $pages
     *
     * @return $this
     */
    public function setPages(float $pages): self
    {
        $this->pages = $pages;

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
