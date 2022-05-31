<?php

namespace OpenEuropa\EPoetry\Authentication\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetServiceTicket implements RequestInterface
{
    /**
     * @var string
     */
    private $service;

    /**
     * Constructor
     *
     * @var string $service
     */
    public function __construct($service)
    {
        $this->service = $service;
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     * @return GetServiceTicket
     */
    public function withService($service)
    {
        $new = clone $this;
        $new->service = $service;

        return $new;
    }
}

