<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSections
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut
     */
    private $linguisticSection;

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut
     */
    public function getLinguisticSection()
    {
        return $this->linguisticSection;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut $linguisticSection
     * @return LinguisticSections
     */
    public function withLinguisticSection($linguisticSection)
    {
        $new = clone $this;
        $new->linguisticSection = $linguisticSection;

        return $new;
    }
}

