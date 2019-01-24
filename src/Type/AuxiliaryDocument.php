<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class AuxiliaryDocument extends DgtDocument
{
    /**
     * @var string
     */
    private $language;

    /**
     * @return string
     */
    public function getLanguage(): string
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
