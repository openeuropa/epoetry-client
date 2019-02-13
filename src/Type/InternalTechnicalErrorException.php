<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class InternalTechnicalErrorException
{
    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
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
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message): InternalTechnicalErrorException
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param string $uid
     *
     * @return $this
     */
    public function setUid(string $uid): InternalTechnicalErrorException
    {
        $this->uid = $uid;

        return $this;
    }
}
