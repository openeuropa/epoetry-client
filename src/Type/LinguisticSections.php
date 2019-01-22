<?php

namespace OpenEuropa\EPoetry\Type;

class LinguisticSections
{

    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticSection
     */
    private $linguisticSection;

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticSection
     */
    public function getLinguisticSection() : \OpenEuropa\EPoetry\Type\LinguisticSection
    {
        return $this->linguisticSection;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticSection $linguisticSection
     * @return $this
     */
    public function setLinguisticSection($linguisticSection) : \OpenEuropa\EPoetry\Type\LinguisticSections
    {
        $this->linguisticSection = $linguisticSection;
        return $this;
    }
}
