<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class LinguisticSectionIn
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LanguageIn
     */
    protected $language;

    /**
     * @return \OpenEuropa\EPoetry\Type\LanguageIn
     */
    public function getLanguage(): ?\OpenEuropa\EPoetry\Type\LanguageIn
    {
        return $this->language;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LanguageIn $language
     *
     * @return $this
     */
    public function setLanguage($language): LinguisticSectionIn
    {
        $this->language = $language;

        return $this;
    }
}
