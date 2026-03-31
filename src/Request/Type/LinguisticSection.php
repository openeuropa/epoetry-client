<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSection
{
    /**
     * @var null | string
     */
    private $language = null;

    /**
     * @param null | string $language
     * @return $this
     */
    public function setLanguage(?string $language): static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getLanguage(): ?string
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
}

