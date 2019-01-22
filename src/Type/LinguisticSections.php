<?php

declare(strict_types = 1);

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
    public function getLinguisticSection(): LinguisticSection
    {
        return $this->linguisticSection;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticSection $linguisticSection
     *
     * @return $this
     */
    public function setLinguisticSection($linguisticSection): self
    {
        $this->linguisticSection = $linguisticSection;

        return $this;
    }
}
