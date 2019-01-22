<?php

namespace OpenEuropa\EPoetry\Type;

class LanguageIn
{

    /**
     * @var string
     */
    private $code;

    /**
     * @return string
     */
    public function getCode() : string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return $this
     */
    public function setCode(string $code) : \OpenEuropa\EPoetry\Type\LanguageIn
    {
        $this->code = $code;
        return $this;
    }
}
