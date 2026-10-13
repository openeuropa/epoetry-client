<?php

namespace OpenEuropa\EPoetry\Authentication\ClientCertificate\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetServiceTicket implements RequestInterface
{
    /**
     * The target service for which you want to obtain a service ticket.
     *  This must be a valid URL.
     *
     * @var string
     */
    private string $service;

    /**
     * Constructor
     *
     * @param string $service
     */
    public function __construct(string $service)
    {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getService(): string
    {
        return $this->service;
    }

    /**
     * @param string $service
     * @return static
     */
    public function withService(string $service): static
    {
        $new = clone $this;
        $new->service = $service;

        return $new;
    }
}

