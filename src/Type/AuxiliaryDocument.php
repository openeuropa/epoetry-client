<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class AuxiliaryDocument extends \OpenEuropa\EPoetry\Type\DgtDocument
{
    /**
     * @var string
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
