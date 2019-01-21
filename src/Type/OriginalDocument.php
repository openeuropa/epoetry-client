<?php

namespace OpenEuropa\EPoetry\Type;

class OriginalDocument
{

    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticSections
     */
    private $linguisticSections;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @var float
     */
    private $pages;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\LinguisticSections $linguisticSections
     * @var bool $trackChanges
     * @var float $pages
     */
    public function __construct(\OpenEuropa\EPoetry\Type\LinguisticSections $linguisticSections, bool $trackChanges, float $pages)
    {
        $this->linguisticSections = $linguisticSections;
        $this->trackChanges = $trackChanges;
        $this->pages = $pages;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticSections
     */
    public function getLinguisticSections() : \OpenEuropa\EPoetry\Type\LinguisticSections
    {
        return $this->linguisticSections;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticSections $linguisticSections
     * @return $this
     */
    public function setLinguisticSections($linguisticSections) : \OpenEuropa\EPoetry\Type\OriginalDocument
    {
        $this->linguisticSections = $linguisticSections;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTrackChanges() : bool
    {
        return $this->trackChanges;
    }

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges) : \OpenEuropa\EPoetry\Type\OriginalDocument
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }

    /**
     * @return float
     */
    public function getPages() : float
    {
        return $this->pages;
    }

    /**
     * @param float $pages
     * @return $this
     */
    public function setPages(float $pages) : \OpenEuropa\EPoetry\Type\OriginalDocument
    {
        $this->pages = $pages;
        return $this;
    }
}
