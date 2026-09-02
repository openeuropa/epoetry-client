<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class ReceiveNotificationResponse
{
    /**
     * @var null | \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
     */
    private $return = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult $return
     * @return $this
     */
    public function setReturn(?\OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult $return): static
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
     */
    public function getReturn(): ?\OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
    {
        return $this->return;
    }

    /**
     * @return bool
     */
    public function hasReturn(): bool
    {
        return !empty($this->return);
    }
}

