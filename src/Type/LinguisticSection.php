<?php

namespace OpenEuropa\EPoetry\Type;

class LinguisticSection
{

    /**
     * @var \OpenEuropa\EPoetry\Type\Language
     */
    private $language;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\Language $language
     */
    public function __construct(\OpenEuropa\EPoetry\Type\Language $language)
    {
        $this->language = $language;
    }

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
