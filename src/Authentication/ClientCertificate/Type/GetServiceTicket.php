<?php

namespace OpenEuropa\EPoetry\Authentication\ClientCertificate\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetServiceTicket implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\AnyURI
     */
    private \OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\AnyURI $service;

    /**
     * Constructor
     *
     * @param \OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\AnyURI $service
     */
    public function __construct(\OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\AnyURI $service)
    {
        $this->service = $service;
    }

    /**
     * @return \OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\AnyURI
     */
    public function getService() : \OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\AnyURI
    {
        return $this->service;
    }

    /**
     * @param \OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\AnyURI $service
     * @return static
     */
    public function withService(\OpenEuropa\EPoetry\Authentication\ClientCertificate\Type\AnyURI $service) : static
    {
        $new = clone $this;
        $new->service = $service;

        return $new;
    }
}

