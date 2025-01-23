<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSections
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut[]|array
     */
    private $linguisticSection = [];

    /**
     * @param LinguisticSectionOut[] $linguisticSection
     * @return $this
     */
    public function setLinguisticSection(array $linguisticSection) : \OpenEuropa\EPoetry\Request\Type\LinguisticSections
    {
        $this->linguisticSection = $linguisticSection;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut[]|array|null
     */
    public function getLinguisticSection() : ?array
    {
        return $this->linguisticSection;
    }

    /**
     * @param LinguisticSectionOut ...$linguisticSections
     * @return $this
     */
    public function addLinguisticSection(... $linguisticSections) : \OpenEuropa\EPoetry\Request\Type\LinguisticSections
    {
        $this->linguisticSection = array_merge($this->linguisticSection, $linguisticSections);return $this;
    }

    /**
     * @return bool
     */
    public function hasLinguisticSection() : bool
    {
        return !empty($this->linguisticSection);
    }
}

