<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocumentIn extends DgtDocumentIn
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
        return !empty($this->language);
    }

    /**
     * @param string $language
     *
     * @return $this
     */
    public function setLanguage(string $language): AuxiliaryDocumentIn
    {
        $this->language = $language;

        return $this;
    }
}
