<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ReceiveNotification implements RequestInterface
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
        return !empty($this->notification);
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
