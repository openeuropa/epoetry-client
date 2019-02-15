<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class OriginalDocumentIn extends DgtDocumentIn
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\LinguisticSections
     */
    protected $linguisticSections;

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
