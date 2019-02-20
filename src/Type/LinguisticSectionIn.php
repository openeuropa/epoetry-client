<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class LinguisticSectionIn
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\LanguageIn
     */
    protected $language;

    /**
     * @return null|\OpenEuropa\EPoetry\Type\LanguageIn
     */
    public function getLanguage(): ?\OpenEuropa\EPoetry\Type\LanguageIn
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage(): bool
    {
        return !empty($this->language);
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
