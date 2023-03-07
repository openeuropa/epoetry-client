<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin;

use Phpro\SoapClient\Caller\Caller;
use OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;
use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;

class EuLoginTicketValidationClient
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
     * @param RequestInterface|Type\ServiceRequest $serviceRequestPart
     * @return ResultInterface|Type\ServiceResponse
     * @throws SoapException
     */
    public function validate(\OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\ServiceRequest $serviceRequestPart) : \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\ServiceResponse
    {
        return ($this->caller)('validate', $serviceRequestPart);
    }
}
