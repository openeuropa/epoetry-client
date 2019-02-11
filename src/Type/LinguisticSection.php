<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class LinguisticSection
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\Language
     */
    protected $language;

    /**
     * @return null|\OpenEuropa\EPoetry\Type\Language
     */
    public function getLanguage(): ?Language
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
     * @param \OpenEuropa\EPoetry\Type\Language $language
     *
     * @return $this
     */
    public function setLanguage($language): LinguisticSection
    {
        $this->language = $language;

        return $this;
    }
}
