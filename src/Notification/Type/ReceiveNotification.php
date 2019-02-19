<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification\Type;

class ReceiveNotification
{
    /**
     * @var null|\OpenEuropa\EPoetry\Notification\Type\DgtNotification
     */
    protected $notification;

    /**
     * @return null|\OpenEuropa\EPoetry\Notification\Type\DgtNotification
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
        if (\is_array($this->notification)) {
            return !empty($this->notification);
        }

        return isset($this->notification);
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\DgtNotification $notification
     *
     * @return $this
     */
    public function setNotification($notification): ReceiveNotification
    {
        $this->notification = $notification;

        return $this;
    }
}
