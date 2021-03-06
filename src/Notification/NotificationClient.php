<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse;
use Phpro\SoapClient\Exception\SoapException;
use Psr\Http\Message\RequestInterface;

class NotificationClient extends \Phpro\SoapClient\Client
{
    /**
     * @param RequestInterface|Type\ReceiveNotification $parameters
     *
     * @throws SoapException
     *
     * @return ReceiveNotificationResponse|ResultInterface
     */
    public function receiveNotification(Type\ReceiveNotification $parameters)
    {
        return $this->call('receiveNotification', $parameters);
    }
}
