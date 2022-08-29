<?php

namespace OpenEuropa\EPoetry\Notification\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ReceiveNotification implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\DgtNotification
     */
    private $notification;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\DgtNotification|null $notification
     * @return $this
     */
    public function setNotification(?\OpenEuropa\EPoetry\Notification\Type\DgtNotification $notification) : \OpenEuropa\EPoetry\Notification\Type\ReceiveNotification
    {
        $this->notification = $notification;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\DgtNotification|null
     */
    public function getNotification() : ?\OpenEuropa\EPoetry\Notification\Type\DgtNotification
    {
        return $this->notification;
    }

    /**
     * @return bool
     */
    public function hasNotification() : bool
    {
        return !empty($this->notification);
    }
}

