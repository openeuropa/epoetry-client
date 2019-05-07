<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSection
{
    /**
     * @var null|string
     */
    protected $language;

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\Language
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
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage(string $language): LinguisticSection
    {
        $this->language = $language;

        return $this;
    }
}
