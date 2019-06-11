<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class OriginalDocumentIn extends DgtDocumentIn
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\LinguisticSections
     */
    protected $linguisticSections;

    /**
     * @var null|bool
     */
    protected $trackChanges;

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\LinguisticSections
     */
    public function getLinguisticSections(): ?LinguisticSections
    {
        return $this->linguisticSections;
    }

    /**
     * @return bool
     */
    public function hasLinguisticSections(): bool
    {
        return !empty($this->linguisticSections);
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
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections
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
