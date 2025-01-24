<?php

namespace OpenEuropa\EPoetry\Request\Type;

class InformativeMessages
{
    /**
     * @var array<int<0,max>, string>
     */
    private $message = [];

    /**
     * @param array<int<0,max>, string> $message
     * @return $this
     */
    public function setMessage(array $message) : static
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return array<int<0,max>, string>
     */
    public function getMessage() : array
    {
        return $this->message;
    }

    /**
     * @param string ...$messages
     * @return $this
     */
    public function addMessage(... $messages) : \OpenEuropa\EPoetry\Request\Type\InformativeMessages
    {
        $this->message = array_merge($this->message, $messages);return $this;
    }

    /**
     * @return bool
     */
    public function hasMessage() : bool
    {
        return !empty($this->message);
    }
}

