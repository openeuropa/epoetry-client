<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSectionIn
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\LanguageIn
     */
    protected $language;

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\LanguageIn
     */
    public function getLanguage(): ?LanguageIn
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
     * @param \OpenEuropa\EPoetry\Request\Type\LanguageIn $language
     *
     * @return $this
     */
    public function setLanguage($language): LinguisticSectionIn
    {
        $this->language = $language;

        return $this;
    }
}
