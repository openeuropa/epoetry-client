<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class LinguisticSections
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticSection[]
     */
    protected $linguisticSection = [];

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticSection $linguisticSection
     *
     * @return $this
     */
    public function addLinguisticSection($linguisticSection): LinguisticSections
    {
        $this->linguisticSection[] = $linguisticSection;

        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticSection[]
     */
    public function getLinguisticSection(): array
    {
        return $this->linguisticSection;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticSection $linguisticSection
     *
     * @return $this
     */
    public function setLinguisticSection($linguisticSection): LinguisticSections
    {
        $this->linguisticSection = $linguisticSection;

        return $this;
    }
}
