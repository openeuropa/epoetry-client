<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class AuxiliaryDocumentIn extends \OpenEuropa\EPoetry\Type\DgtDocumentIn
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
    public function setLanguage(string $language): AuxiliaryDocumentIn
    {
        $this->language = $language;

        return $this;
    }
}
