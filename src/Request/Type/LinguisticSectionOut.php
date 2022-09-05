<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSectionOut
{
    /**
     * @var string
     */
    private $language;

    /**
     * Constructor
     *
     * @var string $language
     */
    public function __construct(string $language)
    {
        $this->language = $language;
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language) : \OpenEuropa\EPoetry\Request\Type\LinguisticSectionOut
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage() : ?string
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

