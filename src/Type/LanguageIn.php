<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class LanguageIn
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode(string $code): LanguageIn
    {
        $this->code = $code;

        return $this;
    }
}
