<?php

namespace OpenEuropa\EPoetry\Type;

class AuxiliaryDocument
{

    /**
     * @var \OpenEuropa\EPoetry\Type\LanguageCode
     */
    private $language;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\LanguageCode $language
     */
    public function __construct(\OpenEuropa\EPoetry\Type\LanguageCode $language)
    {
        $this->language = $language;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\LanguageCode
     */
    public function getLanguage() : \OpenEuropa\EPoetry\Type\LanguageCode
    {
        return $this->language;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LanguageCode $language
     * @return $this
     */
    public function setLanguage($language) : \OpenEuropa\EPoetry\Type\AuxiliaryDocument
    {
        $this->language = $language;
        return $this;
    }
}
