<?php

namespace OpenEuropa\EPoetry\Request\Type;

class NoSuchMethodException
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
     * @return NoSuchMethodException
     */
    public function withMessage($message)
    {
        $new = clone $this;
        $new->message = $message;

        return $new;
    }
}

