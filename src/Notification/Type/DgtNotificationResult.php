<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class DgtNotificationResult
{
    /**
     * @var bool
     */
    private $success;

    /**
     * @var string
     */
    private $message;

    /**
     * @param bool $success
     * @return $this
     */
    public function setSuccess(bool $success) : static
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSuccess() : ?bool
    {
        return $this->success;
    }

    /**
     * @return bool
     */
    public function hasSuccess() : bool
    {
        return !empty($this->success);
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message) : static
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

