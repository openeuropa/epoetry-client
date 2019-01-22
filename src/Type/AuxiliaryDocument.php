<?php

namespace OpenEuropa\EPoetry\Type;

use \OpenEuropa\EPoetry\Type\DgtDocument;

class AuxiliaryDocument extends DgtDocument
{

    /**
     * @var string
     */
    private $language;

    /**
     * @return string
     */
    public function getLanguage() : string
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language) : \OpenEuropa\EPoetry\Type\AuxiliaryDocument
    {
        $this->language = $language;
        return $this;
    }
}
