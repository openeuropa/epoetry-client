<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSections
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut
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
    public function setLinguisticSection($linguisticSection) : \OpenEuropa\EPoetry\Request\Type\LinguisticSections
    {
        $this->linguisticSection = $linguisticSection;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut|null
     */
    public function getLinguisticSection() : ?\OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut
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

