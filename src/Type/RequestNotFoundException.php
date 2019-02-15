<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class RequestNotFoundException
{
    /**
     * @var null|string
     */
    protected $message;

    /**
     * @var null|string
     */
    protected $uid;

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return null|string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @return bool
     */
    public function hasMessage(): bool
    {
        if (\is_array($this->message)) {
            return !empty($this->message);
        }

        return isset($this->message);
    }

    /**
     * @return bool
     */
    public function hasUid(): bool
    {
        if (\is_array($this->uid)) {
            return !empty($this->uid);
        }

        return isset($this->uid);
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message): RequestNotFoundException
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param string $uid
     *
     * @return $this
     */
    public function setUid(string $uid): RequestNotFoundException
    {
        $this->uid = $uid;

        return $this;
    }
}
