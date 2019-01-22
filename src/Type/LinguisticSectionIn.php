<?php

namespace OpenEuropa\EPoetry\Type;

class LinguisticSectionIn
{

    /**
     * @var \OpenEuropa\EPoetry\Type\LanguageIn
     */
    private $language;

    /**
     * @return \OpenEuropa\EPoetry\Type\LanguageIn
     */
    public function getLanguage() : \OpenEuropa\EPoetry\Type\LanguageIn
    {
        return $this->language;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LanguageIn $language
     * @return $this
     */
    public function setLanguage($language) : \OpenEuropa\EPoetry\Type\LinguisticSectionIn
    {
        $this->language = $language;
        return $this;
    }


}

