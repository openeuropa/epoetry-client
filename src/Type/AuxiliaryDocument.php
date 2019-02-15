<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class AuxiliaryDocument extends DgtDocument
{
    /**
     * @var null|string
     */
    protected $language;

    /**
     * @return null|string
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
        if (\is_array($this->language)) {
            return !empty($this->language);
        }

        return isset($this->language);
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage(string $language): AuxiliaryDocument
    {
        $this->language = $language;

        return $this;
    }
}
