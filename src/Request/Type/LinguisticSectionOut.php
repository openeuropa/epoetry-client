<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSectionOut
{
    /**
     * @var string
     */
    private $language;

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return LinguisticSectionOut
     */
    public function withLanguage($language)
    {
        $new = clone $this;
        $new->language = $language;

        return $new;
    }
}

