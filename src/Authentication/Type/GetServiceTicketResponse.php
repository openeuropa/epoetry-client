<?php

namespace OpenEuropa\EPoetry\Authentication\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GetServiceTicketResponse implements ResultInterface
{
    /**
     * @var string
     */
    private $serviceTicket;

    /**
     * @return string
     */
    public function getServiceTicket()
    {
        return $this->serviceTicket;
    }

    /**
     * @param string $serviceTicket
     * @return GetServiceTicketResponse
     */
    public function withServiceTicket($serviceTicket)
    {
        $new = clone $this;
        $new->serviceTicket = $serviceTicket;

        return $new;
    }
}

