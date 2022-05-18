<?php

namespace OpenEuropa\EPoetry\Request\Type;

class UnsupportedEncodingException
{
    /**
     * @var string
     */
    private $message;

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return UnsupportedEncodingException
     */
    public function withMessage($message)
    {
        $new = clone $this;
        $new->message = $message;

        return $new;
    }
}

