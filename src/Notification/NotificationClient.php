<?php

namespace OpenEuropa\Notification;

use Phpro\SoapClient\Caller\Caller;
use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;
use OpenEuropa\EPoetry\Notification\Type;

class NotificationClient
{
    /**
     * @var Caller
     */
    private $caller;

    public function __construct(\Phpro\SoapClient\Caller\Caller $caller)
    {
        $this->caller = $caller;
    }

    /**
     * @param RequestInterface|Type\ReceiveNotification $parameters
     * @return ResultInterface|Type\ReceiveNotificationResponse
     * @throws SoapException
     */
    public function receiveNotification(\OpenEuropa\EPoetry\Notification\Type\ReceiveNotification $parameters) : \OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse
    {
        return ($this->caller)('receiveNotification', $parameters);
    }
}

