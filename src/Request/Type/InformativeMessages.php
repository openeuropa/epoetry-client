<?php

namespace OpenEuropa\EPoetry\Request\Type;

class InformativeMessages
{
    /**
     * @var string[]|array
     */
    private $message = [];

    /**
     * @param string[]|null $message
     * @return $this
     */
    public function setMessage(array $message) : \OpenEuropa\EPoetry\Request\Type\InformativeMessages
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string[]|array|null
     */
    public function getMessage() : ?array
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

