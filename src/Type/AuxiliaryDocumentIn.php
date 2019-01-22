<?php

namespace OpenEuropa\EPoetry\Type;

use \OpenEuropa\EPoetry\Type\DgtDocumentIn;

class AuxiliaryDocumentIn extends DgtDocumentIn
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
    public function setLanguage(string $language) : \OpenEuropa\EPoetry\Type\AuxiliaryDocumentIn
    {
        $this->language = $language;
        return $this;
    }
}
