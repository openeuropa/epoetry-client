<?php

namespace OpenEuropa\EPoetry\Type;

class LanguageIn
{

    /**
     * @var \OpenEuropa\EPoetry\Type\LanguageCode
     */
    private $code;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\LanguageCode $code
     */
    public function __construct(\OpenEuropa\EPoetry\Type\LanguageCode $code)
    {
        $this->code = $code;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\LanguageCode
     */
    public function getCode() : \OpenEuropa\EPoetry\Type\LanguageCode
    {
        return $this->code;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LanguageCode $code
     * @return $this
     */
    public function setCode($code) : \OpenEuropa\EPoetry\Type\LanguageIn
    {
        $this->code = $code;
        return $this;
    }
}
