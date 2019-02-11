<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class GetLinguisticRequest implements RequestInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    protected $request;

    /**
     * @return null|\OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    public function getRequest(): ?RequestReferenceIn
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
