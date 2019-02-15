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
        if (\is_array($this->language)) {
            return !empty($this->language);
        }

        return isset($this->language);
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
