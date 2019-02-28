<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification;

use OpenEuropa\EPoetry\Notification\Type\ReceiveNotification;
use OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse;
use OpenEuropa\EPoetry\Type\CreateRequests;
use OpenEuropa\EPoetry\Type\CreateRequestsResponse;
use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;
use Phpro\SoapClient\Type\ResultInterface;

class EPoetryNotificationClient extends \Phpro\SoapClient\Client
{
    /**
     * @param CreateRequests|RequestInterface $parameters
     *
     * @throws SoapException
     *
     * @return CreateRequestsResponse|ResultInterface
     */
    public function receiveNotification(ReceiveNotification $parameters): ReceiveNotificationResponse
    {
        return $this->call('receiveNotification', $parameters);
    }
}
