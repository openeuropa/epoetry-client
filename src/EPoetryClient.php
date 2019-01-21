<?php

namespace OpenEuropa\EPoetry;

use OpenEuropa\EPoetry\Type;
use Phpro\SoapClient\Type\RequestInterface;
use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Exception\SoapException;

class EPoetryClient extends \Phpro\SoapClient\Client
{

    /**
     * @param RequestInterface|Type\FindLinguisticRequest $parameters
     * @return ResultInterface|Type\FindLinguisticRequestResponse
     * @throws SoapException
     */
    public function findLinguisticRequest(\OpenEuropa\EPoetry\Type\FindLinguisticRequest $parameters) : \OpenEuropa\EPoetry\Type\FindLinguisticRequestResponse
    {
        return $this->call('findLinguisticRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\ModifyRequest $parameters
     * @return ResultInterface|Type\ModifyRequestResponse
     * @throws SoapException
     */
    public function modifyRequest(\OpenEuropa\EPoetry\Type\ModifyRequest $parameters) : \OpenEuropa\EPoetry\Type\ModifyRequestResponse
    {
        return $this->call('modifyRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\CorrectTranslation $parameters
     * @return ResultInterface|Type\CorrectTranslationResponse
     * @throws SoapException
     */
    public function correctTranslation(\OpenEuropa\EPoetry\Type\CorrectTranslation $parameters) : \OpenEuropa\EPoetry\Type\CorrectTranslationResponse
    {
        return $this->call('correctTranslation', $parameters);
    }

    /**
     * @param RequestInterface|Type\ReceiveNotifications $parameters
     * @return ResultInterface|Type\ReceiveNotificationsResponse
     * @throws SoapException
     */
    public function receiveNotifications(\OpenEuropa\EPoetry\Type\ReceiveNotifications $parameters) : \OpenEuropa\EPoetry\Type\ReceiveNotificationsResponse
    {
        return $this->call('receiveNotifications', $parameters);
    }

    /**
     * @param RequestInterface|Type\GetLinguisticRequest $parameters
     * @return ResultInterface|Type\GetLinguisticRequestResponse
     * @throws SoapException
     */
    public function getLinguisticRequest(\OpenEuropa\EPoetry\Type\GetLinguisticRequest $parameters) : \OpenEuropa\EPoetry\Type\GetLinguisticRequestResponse
    {
        return $this->call('getLinguisticRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\CreateRequests $parameters
     * @return ResultInterface|Type\CreateRequestsResponse
     * @throws SoapException
     */
    public function createRequests(\OpenEuropa\EPoetry\Type\CreateRequests $parameters) : \OpenEuropa\EPoetry\Type\CreateRequestsResponse
    {
        return $this->call('createRequests', $parameters);
    }
}
