<?php

namespace OpenEuropa\EPoetry\Type;

class LinguisticSection
{

    /**
     * @var \OpenEuropa\EPoetry\Type\Language
     */
    private $language;

    /**
     * @return \OpenEuropa\EPoetry\Type\Language
     */
    public function getLanguage() : \OpenEuropa\EPoetry\Type\Language
    {
        return $this->language;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\Language $language
     * @return $this
     */
    public function setLanguage($language) : \OpenEuropa\EPoetry\Type\LinguisticSection
    {
        $this->language = $language;
        return $this;
    }
}
