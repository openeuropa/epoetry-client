<?php

namespace OpenEuropa\EPoetry\Type;

use \OpenEuropa\EPoetry\Type\DgtDocumentIn;

class OriginalDocumentIn extends DgtDocumentIn
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
    public function setLinguisticSections($linguisticSections) : \OpenEuropa\EPoetry\Type\OriginalDocumentIn
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
    public function setTrackChanges(bool $trackChanges) : \OpenEuropa\EPoetry\Type\OriginalDocumentIn
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }


}

