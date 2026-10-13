<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSections
{
    /**
     * @var array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut>
     */
    private $linguisticSection = [];

    /**
     * @param array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut> $linguisticSection
     * @return $this
     */
    public function setLinguisticSection(array $linguisticSection): static
    {
        $this->linguisticSection = $linguisticSection;
        return $this;
    }

    /**
     * @return array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut>
     */
    public function getLinguisticSection(): array
    {
        return $this->linguisticSection;
    }

    /**
     * @param LinguisticSectionOut ...$linguisticSections
     * @return $this
     */
    public function addLinguisticSection(... $linguisticSections): \OpenEuropa\EPoetry\Request\Type\LinguisticSections
    {
        $this->linguisticSection = array_merge($this->linguisticSection, $linguisticSections);return $this;
    }

    /**
     * @return bool
     */
    public function hasLinguisticSection(): bool
    {
        return !empty($this->linguisticSection);
    }
}

