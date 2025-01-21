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
     * @param RequestInterface & Type\ResubmitRequest $parameters
     * @return ResultInterface & Type\ResubmitRequestResponse
     * @throws SoapException
     */
    public function resubmitRequest(\OpenEuropa\EPoetry\Request\Type\ResubmitRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\ResubmitRequestResponse
    {
        $response = ($this->caller)('resubmitRequest', $parameters);

        \Psl\Type\instance_of(\OpenEuropa\EPoetry\Request\Type\ResubmitRequestResponse::class)->assert($response);
        \Psl\Type\instance_of(\Phpro\SoapClient\Type\ResultInterface::class)->assert($response);

        return $response;
    }

    /**
     * @param RequestInterface & Type\UpdateCallbackUrl $parameters
     * @return ResultInterface & Type\UpdateCallbackUrlResponse
     * @throws SoapException
     */
    public function updateCallbackUrl(\OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrl $parameters) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlResponse
    {
        $response = ($this->caller)('updateCallbackUrl', $parameters);

        \Psl\Type\instance_of(\OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlResponse::class)->assert($response);
        \Psl\Type\instance_of(\Phpro\SoapClient\Type\ResultInterface::class)->assert($response);

        return $response;
    }

    /**
     * @param RequestInterface & Type\ModifyLinguisticRequest $parameters
     * @return ResultInterface & Type\ModifyLinguisticRequestResponse
     * @throws SoapException
     */
    public function modifyLinguisticRequest(\OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestResponse
    {
        $response = ($this->caller)('modifyLinguisticRequest', $parameters);

        \Psl\Type\instance_of(\OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestResponse::class)->assert($response);
        \Psl\Type\instance_of(\Phpro\SoapClient\Type\ResultInterface::class)->assert($response);

        return $response;
    }

    /**
     * @param RequestInterface & Type\AddNewPartToDossier $parameters
     * @return ResultInterface & Type\AddNewPartToDossierResponse
     * @throws SoapException
     */
    public function addNewPartToDossier(\OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier $parameters) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossierResponse
    {
        $response = ($this->caller)('addNewPartToDossier', $parameters);

        \Psl\Type\instance_of(\OpenEuropa\EPoetry\Request\Type\AddNewPartToDossierResponse::class)->assert($response);
        \Psl\Type\instance_of(\Phpro\SoapClient\Type\ResultInterface::class)->assert($response);

        return $response;
    }

    /**
     * @param RequestInterface & Type\CreateNewVersion $parameters
     * @return ResultInterface & Type\CreateNewVersionResponse
     * @throws SoapException
     */
    public function createNewVersion(\OpenEuropa\EPoetry\Request\Type\CreateNewVersion $parameters) : \OpenEuropa\EPoetry\Request\Type\CreateNewVersionResponse
    {
        $response = ($this->caller)('createNewVersion', $parameters);

        \Psl\Type\instance_of(\OpenEuropa\EPoetry\Request\Type\CreateNewVersionResponse::class)->assert($response);
        \Psl\Type\instance_of(\Phpro\SoapClient\Type\ResultInterface::class)->assert($response);

        return $response;
    }

    /**
     * @param RequestInterface & Type\GetLinguisticRequest $parameters
     * @return ResultInterface & Type\GetLinguisticRequestResponse
     * @throws SoapException
     */
    public function getLinguisticRequest(\OpenEuropa\EPoetry\Request\Type\GetLinguisticRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\GetLinguisticRequestResponse
    {
        $response = ($this->caller)('getLinguisticRequest', $parameters);

        \Psl\Type\instance_of(\OpenEuropa\EPoetry\Request\Type\GetLinguisticRequestResponse::class)->assert($response);
        \Psl\Type\instance_of(\Phpro\SoapClient\Type\ResultInterface::class)->assert($response);

        return $response;
    }

    /**
     * @param RequestInterface & Type\CreateLinguisticRequest $parameters
     * @return ResultInterface & Type\CreateLinguisticRequestResponse
     * @throws SoapException
     */
    public function createLinguisticRequest(\OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequestResponse
    {
        $response = ($this->caller)('createLinguisticRequest', $parameters);

        \Psl\Type\instance_of(\OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequestResponse::class)->assert($response);
        \Psl\Type\instance_of(\Phpro\SoapClient\Type\ResultInterface::class)->assert($response);

        return $response;
    }

    /**
     * @param RequestInterface & Type\CreateCorrectionRequest $parameters
     * @return ResultInterface & Type\CreateCorrectionRequestResponse
     * @throws SoapException
     */
    public function createCorrectionRequest(\OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequest $parameters) : \OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequestResponse
    {
        $response = ($this->caller)('createCorrectionRequest', $parameters);

        \Psl\Type\instance_of(\OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequestResponse::class)->assert($response);
        \Psl\Type\instance_of(\Phpro\SoapClient\Type\ResultInterface::class)->assert($response);

        return $response;
    }
}

