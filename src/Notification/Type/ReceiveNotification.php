<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class ReceiveNotification
{
    /**
     * @var null | \OpenEuropa\EPoetry\Notification\Type\DgtNotification
     */
    private $notification = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Notification\Type\DgtNotification $notification
     * @return $this
     */
    public function setNotification(?\OpenEuropa\EPoetry\Notification\Type\DgtNotification $notification): static
    {
        $this->notification = $notification;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Notification\Type\DgtNotification
     */
    public function getNotification(): ?\OpenEuropa\EPoetry\Notification\Type\DgtNotification
    {
        return $this->notification;
    }

    /**
     * @return bool
     */
    public function hasNotification(): bool
    {
        return !empty($this->notification);
    }
}

