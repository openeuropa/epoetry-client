<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class LinguisticSections
{
    /**
     * @var array|\OpenEuropa\EPoetry\Type\LinguisticSection[]
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
     * @return array|\OpenEuropa\EPoetry\Type\LinguisticSection[]
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
        if (\is_array($this->linguisticSection)) {
            return !empty($this->linguisticSection);
        }

        return isset($this->linguisticSection);
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
