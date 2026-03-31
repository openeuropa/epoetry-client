<?php

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticSectionOut
{
    /**
     * @var null | string
     */
    private $language = null;

    /**
     * Constructor
     *
     * @param null | string $language
     */
    public function __construct(?string $language)
    {
        $this->language = $language;
    }

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

