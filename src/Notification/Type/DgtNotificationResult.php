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
     * @return bool
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @param bool $success
     * @return DgtNotificationResult
     */
    public function withSuccess($success)
    {
        $new = clone $this;
        $new->success = $success;

        return $new;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return DgtNotificationResult
     */
    public function withMessage($message)
    {
        $new = clone $this;
        $new->message = $message;

        return $new;
    }
}

