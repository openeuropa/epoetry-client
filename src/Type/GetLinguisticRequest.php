<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetLinguisticRequest implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    protected $request;

    /**
     * @return null|\OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    public function getRequest(): ?\OpenEuropa\EPoetry\Type\RequestReferenceIn
    {
        return $this->request;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestReferenceIn $request
     *
     * @return $this
     */
    public function setRequest($request): GetLinguisticRequest
    {
        $this->request = $request;

        return $this;
    }
}
