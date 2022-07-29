<?php

namespace OpenEuropa\EPoetry\Request;

use Phpro\SoapClient\Caller\Caller;
use OpenEuropa\EPoetry\Request\Type;
use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;

class RequestClient
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
     * @param RequestInterface|Type\ResubmitRequest $parameters
     * @return ResultInterface|Type\ResubmitRequestResponse
     * @throws SoapException
     */
    public function resubmitRequest(\OpenEuropa\EPoetry\Request\Type\ResubmitRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\ResubmitRequestResponse
    {
        return ($this->caller)('resubmitRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\UpdateCallbackUrl $parameters
     * @return ResultInterface|Type\UpdateCallbackUrlOut
     * @throws SoapException
     */
    public function updateCallbackUrl(\OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrl $parameters) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
    {
        return ($this->caller)('updateCallbackUrl', $parameters);
    }

    /**
     * @param RequestInterface|Type\ModifyLinguisticRequest $parameters
     * @return ResultInterface|Type\ModifyLinguisticRequestResponse
     * @throws SoapException
     */
    public function modifyLinguisticRequest(\OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestResponse
    {
        return ($this->caller)('modifyLinguisticRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\AddNewPartToDossier $parameters
     * @return ResultInterface|Type\AddNewPartToDossierResponse
     * @throws SoapException
     */
    public function addNewPartToDossier(\OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier $parameters) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossierResponse
    {
        return ($this->caller)('addNewPartToDossier', $parameters);
    }

    /**
     * @param RequestInterface|Type\CreateNewVersion $parameters
     * @return ResultInterface|Type\CreateNewVersionResponse
     * @throws SoapException
     */
    public function createNewVersion(\OpenEuropa\EPoetry\Request\Type\CreateNewVersion $parameters) : \OpenEuropa\EPoetry\Request\Type\CreateNewVersionResponse
    {
        return ($this->caller)('createNewVersion', $parameters);
    }

    /**
     * @param RequestInterface|Type\GetLinguisticRequest $parameters
     * @return ResultInterface|Type\GetLinguisticRequestResponse
     * @throws SoapException
     */
    public function getLinguisticRequest(\OpenEuropa\EPoetry\Request\Type\GetLinguisticRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\GetLinguisticRequestResponse
    {
        return ($this->caller)('getLinguisticRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\CreateLinguisticRequest $parameters
     * @return ResultInterface|Type\CreateLinguisticRequestResponse
     * @throws SoapException
     */
    public function createLinguisticRequest(\OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequestResponse
    {
        return ($this->caller)('createLinguisticRequest', $parameters);
    }

    /**
     * @param RequestInterface|Type\CreateCorrectionRequest $parameters
     * @return ResultInterface|Type\CreateCorrectionRequestResponse
     * @throws SoapException
     */
    public function createCorrectionRequest(\OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequestResponse
    {
        return ($this->caller)('createCorrectionRequest', $parameters);
    }
}

