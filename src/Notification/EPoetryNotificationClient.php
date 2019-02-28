<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse;
use Phpro\SoapClient\Exception\SoapException;

class EPoetryNotificationClient extends \Phpro\SoapClient\Client
{
    /**
     * @param ClientInterface $parameters
     *
     * @throws SoapException
     *
     * @return ReceiveNotificationResponse
     */
    public function receiveNotification(ClientInterface $parameters): ReceiveNotificationResponse
    {
        return $this->call('receiveNotification', $parameters);
    }
}
