<?php

namespace OpenEuropa\EPoetry\Request\Type;

class UnsupportedEncodingException
{
    /**
     * @var string
     */
    private $message;

    /**
     * @param string|null $message
     * @return $this
     */
    public function setMessage(?string $message) : \OpenEuropa\EPoetry\Request\Type\UnsupportedEncodingException
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage() : ?string
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function hasMessage() : bool
    {
        return !empty($this->message);
    }
}

