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
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference
     * @var string $status
     */
    public function __construct(\OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference, string $status)
    {
        $this->requestReference = $requestReference;
        $this->status = $status;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference
     * @return $this
     */
    public function setRequestReference(\OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference) : \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    public function getRequestReference() : \OpenEuropa\EPoetry\Notification\Type\RequestReference
    {
        return $this->requestReference;
    }

    /**
     * @return bool
     */
    public function hasRequestReference() : bool
    {
        return !empty($this->requestReference);
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status) : \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus() : string
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function hasStatus() : bool
    {
        return !empty($this->status);
    }
}

