<?php

namespace OpenEuropa\EPoetry\Authentication\ClientCertificate;

use Phpro\SoapClient\Caller\Caller;
use Phpro\SoapClient\Type\ResultInterface;
use OpenEuropa\EPoetry\Authentication\ClientCertificate\Type;
use Phpro\SoapClient\Exception\SoapException;
use Phpro\SoapClient\Type\RequestInterface;

class ClientCertificateClient
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
    public function getServiceTicket(\OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\GetServiceTicket $getServiceTicketPart) : \OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\GetServiceTicketResponse
    {
        return ($this->caller)('getServiceTicket', $getServiceTicketPart);
    }
}
