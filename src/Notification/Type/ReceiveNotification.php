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
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Notification\Type\DgtNotification $notification
     */
    public function __construct(\OpenEuropa\EPoetry\Notification\Type\DgtNotification $notification)
    {
        $this->notification = $notification;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\DgtNotification $notification
     * @return $this
     */
    public function setNotification(\OpenEuropa\EPoetry\Notification\Type\DgtNotification $notification) : \OpenEuropa\EPoetry\Notification\Type\ReceiveNotification
    {
        $this->notification = $notification;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\DgtNotification
     */
    public function getNotification() : \OpenEuropa\EPoetry\Notification\Type\DgtNotification
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

