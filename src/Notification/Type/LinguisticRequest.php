<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class LinguisticRequest
{
    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    private $requestReference;

    /**
     * @var string
     */
    private $status;

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference
     * @return LinguisticRequest
     */
    public function withRequestReference($requestReference)
    {
        $new = clone $this;
        $new->requestReference = $requestReference;

        return $new;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return LinguisticRequest
     */
    public function withStatus($status)
    {
        $new = clone $this;
        $new->status = $status;

        return $new;
    }
}

