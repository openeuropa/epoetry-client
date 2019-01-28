<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class OriginalDocumentIn extends DgtDocumentIn
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticSections
     */
    protected $linguisticSections;

    /**
     * @var bool
     */
    protected $trackChanges;

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticSections
     */
    public function getLinguisticSections(): LinguisticSections
    {
        return $this->linguisticSections;
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
    public function setLinguisticSections($linguisticSections): OriginalDocumentIn
    {
        $this->linguisticSections = $linguisticSections;

        return $this;
    }

    /**
     * @param bool $trackChanges
     *
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges): OriginalDocumentIn
    {
        $this->trackChanges = $trackChanges;

        return $this;
    }
}
