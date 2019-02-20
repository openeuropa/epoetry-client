<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class MissingOrInvalidParameterException
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
        return !empty($this->message);
    }

    /**
     * @return bool
     */
    public function hasUid(): bool
    {
        return !empty($this->uid);
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message): MissingOrInvalidParameterException
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param string $uid
     *
     * @return $this
     */
    public function setUid(string $uid): MissingOrInvalidParameterException
    {
        $this->uid = $uid;

        return $this;
    }
}
