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
    public function setSuccess(bool $success) : \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccess() : bool
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
    public function setMessage(string $message) : \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage() : string
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

