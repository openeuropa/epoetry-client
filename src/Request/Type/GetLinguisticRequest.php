<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetLinguisticRequest implements RequestInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    protected $request;

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    public function getRequest(): ?\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
    {
        return $this->request;
    }

    /**
     * @return bool
     */
    public function hasRequest(): bool
    {
        return !empty($this->request);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $request
     *
     * @return $this
     */
    public function setRequest($request): GetLinguisticRequest
    {
        $this->request = $request;

        return $this;
    }
}
