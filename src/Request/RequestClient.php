<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request;

use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;
use Phpro\SoapClient\Type\ResultInterface;

class RequestClient extends \Phpro\SoapClient\Client
{
    /**
     * @param RequestInterface|Type\CorrectTranslation $parameters
     *
     * @throws SoapException
     *
     * @return ResultInterface|Type\CorrectTranslationResponse
     */
    public function correctTranslation(Type\CorrectTranslation $parameters)
    {
        return $this->call('correctTranslation', $parameters);
    }

    /**
     * @param RequestInterface|Type\CreateRequests $parameters
     *
     * @throws SoapException
     *
     * @return ResultInterface|Type\CreateRequestsResponse
     */
    public function createRequests(Type\CreateRequests $parameters)
    {
        return $this->call('createRequests', $parameters);
    }

    /**
     * @param RequestInterface|Type\FindLinguisticRequest $parameters
     *
     * @throws SoapException
     *
     * @return ResultInterface|Type\FindLinguisticRequestResponse
     */
    public function findLinguisticRequest(Type\FindLinguisticRequest $parameters)
    {
        return $this->call('findLinguisticRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\GetLinguisticRequest $parameters
     *
     * @throws SoapException
     *
     * @return ResultInterface|Type\GetLinguisticRequestResponse
     */
    public function getLinguisticRequest(Type\GetLinguisticRequest $parameters)
    {
        return $this->call('getLinguisticRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\ModifyRequest $parameters
     *
     * @throws SoapException
     *
     * @return ResultInterface|Type\ModifyRequestResponse
     */
    public function modifyRequest(Type\ModifyRequest $parameters)
    {
        return $this->call('modifyRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\ReceiveNotifications $parameters
     *
     * @throws SoapException
     *
     * @return ResultInterface|Type\ReceiveNotificationsResponse
     */
    public function receiveNotifications(Type\ReceiveNotifications $parameters)
    {
        return $this->call('receiveNotifications', $parameters);
    }
}
