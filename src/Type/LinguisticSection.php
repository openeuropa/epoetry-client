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
    public function getLanguage(): ?\OpenEuropa\EPoetry\Type\Language
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
