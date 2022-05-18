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
    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\DgtNotification
     */
    public function getNotification()
    {
        return $this->notification;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\DgtNotification $notification
     * @return ReceiveNotification
     */
    public function withNotification($notification)
    {
        $new = clone $this;
        $new->notification = $notification;

        return $new;
    }
}

