<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSections
{
    /**
     * @var array|\OpenEuropa\EPoetry\Request\Type\LinguisticSection[]
     */
    protected $linguisticSection = [];

    /**
     * @param LinguisticSection ...$linguisticSections
     *
     * @return $this
     */
    public function addLinguisticSection(...$linguisticSections): LinguisticSections
    {
        $this->linguisticSection = array_merge($this->linguisticSection, $linguisticSections);

        return $this;
    }

    /**
     * @return array|\OpenEuropa\EPoetry\Request\Type\LinguisticSection[]
     */
    public function getLinguisticSection(): array
    {
        return $this->linguisticSection;
    }

    /**
     * @return bool
     */
    public function hasLinguisticSection(): bool
    {
        return !empty($this->linguisticSection);
    }

    /**
     * @param LinguisticSection[] $linguisticSection
     *
     * @return $this
     */
    public function setLinguisticSection(array $linguisticSection): LinguisticSections
    {
        $this->linguisticSection = $linguisticSection;

        return $this;
    }
}
