<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSection
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\Language
     */
    protected $language;

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\Language
     */
    public function getLanguage(): ?\OpenEuropa\EPoetry\Request\Type\Language
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
     * @param \OpenEuropa\EPoetry\Request\Type\Language $language
     *
     * @return $this
     */
    public function setLanguage($language): LinguisticSection
    {
        $this->language = $language;

        return $this;
    }
}
