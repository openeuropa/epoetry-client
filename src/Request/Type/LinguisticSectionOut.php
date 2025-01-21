<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSectionOut
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Language
     */
    private $language;

    /**
     * Constructor
     *
     * @param \OpenEuropa\EPoetry\Request\Type\Language $language
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\Language $language)
    {
        $this->language = $language;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Language $language
     * @return $this
     */
    public function setLanguage(\OpenEuropa\EPoetry\Request\Type\Language $language) : static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Language|null
     */
    public function getLanguage() : ?\OpenEuropa\EPoetry\Request\Type\Language
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage() : bool
    {
        return !empty($this->language);
    }
}

