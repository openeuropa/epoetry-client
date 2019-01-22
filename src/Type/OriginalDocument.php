<?php

namespace OpenEuropa\EPoetry\Type;

use \OpenEuropa\EPoetry\Type\DgtDocument;

class OriginalDocument extends DgtDocument
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

