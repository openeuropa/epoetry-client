<?php

namespace OpenEuropa\EPoetry\Type;

class Language
{

    /**
     * @var string
     */
    private $code;

    /**
     * Constructor
     *
     * @var string $code
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }

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
    public function setCode(string $code) : \OpenEuropa\EPoetry\Type\Language
    {
        $this->code = $code;
        return $this;
    }
}
