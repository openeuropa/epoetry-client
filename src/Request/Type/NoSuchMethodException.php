<?php

namespace OpenEuropa\EPoetry\Request\Type;

class NoSuchMethodException
{
    /**
     * @var null | string
     */
    private $message = null;

    /**
     * @param null | string $message
     * @return $this
     */
    public function setMessage(?string $message): static
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function hasMessage(): bool
    {
        return !empty($this->message);
    }
}

