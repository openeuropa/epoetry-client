<?php

namespace OpenEuropa\EPoetry\Authentication\ClientCertificate\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GetServiceTicketResponse implements ResultInterface
{
    /**
     * Service ticket for the specified service.
     *
     * @var string
     */
    private string $serviceTicket;

    /**
     * @return string
     */
    public function getServiceTicket(): string
    {
        return $this->serviceTicket;
    }

    /**
     * @param string $serviceTicket
     * @return static
     */
    public function withServiceTicket(string $serviceTicket): static
    {
        $new = clone $this;
        $new->serviceTicket = $serviceTicket;

        return $new;
    }
}

