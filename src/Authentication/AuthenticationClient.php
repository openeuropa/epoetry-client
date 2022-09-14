<?php

namespace OpenEuropa\EPoetry\Authentication;

use Phpro\SoapClient\Caller\Caller;
use Phpro\SoapClient\Type\ResultInterface;
use OpenEuropa\EPoetry\Authentication\Type;
use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;

class AuthenticationClient
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
     * @param RequestInterface|Type\GetServiceTicket $getServiceTicketPart
     * @return ResultInterface|Type\GetServiceTicketResponse
     * @throws SoapException
     */
    public function getServiceTicket(\OpenEuropa\EPoetry\Authentication\Type\GetServiceTicket $getServiceTicketPart) : \OpenEuropa\EPoetry\Authentication\Type\GetServiceTicketResponse
    {
        return ($this->caller)('getServiceTicket', $getServiceTicketPart);
    }
}

