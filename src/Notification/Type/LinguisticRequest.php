<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class LinguisticRequest
{
    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    private $requestReference;

    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\RequestStatus
     */
    private $status;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference
     * @return $this
     */
    public function setRequestReference(\OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference) : static
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\RequestReference|null
     */
    public function getRequestReference() : ?\OpenEuropa\EPoetry\Notification\Type\RequestReference
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
     * @param \OpenEuropa\EPoetry\Notification\Type\RequestStatus $status
     * @return $this
     */
    public function setStatus(\OpenEuropa\EPoetry\Notification\Type\RequestStatus $status) : static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\RequestStatus|null
     */
    public function getStatus() : ?\OpenEuropa\EPoetry\Notification\Type\RequestStatus
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

