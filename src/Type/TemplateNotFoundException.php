<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class TemplateNotFoundException
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
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return string
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
    public function setMessage(string $message): TemplateNotFoundException
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param string $uid
     *
     * @return $this
     */
    public function setUid(string $uid): TemplateNotFoundException
    {
        $this->uid = $uid;

        return $this;
    }
}
