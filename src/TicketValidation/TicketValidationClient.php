<?php

namespace OpenEuropa\EPoetry\TicketValidation;

use Phpro\SoapClient\Caller\Caller;
use OpenEuropa\EPoetry\TicketValidation\Type;
use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;

class TicketValidationClient
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
    public function validate(\OpenEuropa\EPoetry\TicketValidation\Type\ServiceRequest $serviceRequestPart) : \OpenEuropa\EPoetry\TicketValidation\Type\ServiceResponse
    {
        return ($this->caller)('validate', $serviceRequestPart);
    }
}

