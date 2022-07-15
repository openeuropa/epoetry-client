<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSections
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut
     */
    private $linguisticSection;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut $linguisticSection
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut $linguisticSection)
    {
        $this->linguisticSection = $linguisticSection;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut $linguisticSection
     * @return $this
     */
    public function setLinguisticSection(\OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut $linguisticSection) : \OpenEuropa\EPoetry\Request\Type\LinguisticSections
    {
        $this->linguisticSection = $linguisticSection;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut
     */
    public function getLinguisticSection() : \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut
    {
        return $this->linguisticSection;
    }

    /**
     * @return bool
     */
    public function hasLinguisticSection() : bool
    {
        return !empty($this->linguisticSection);
    }
}

