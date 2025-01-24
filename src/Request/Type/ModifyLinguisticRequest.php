<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ModifyLinguisticRequest implements RequestInterface
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn
     */
    private $modifyLinguisticRequest = null;

    /**
     * @var null | string
     */
    private $applicationName = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn $modifyLinguisticRequest
     * @return $this
     */
    public function setModifyLinguisticRequest(?\OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn $modifyLinguisticRequest) : static
    {
        $this->modifyLinguisticRequest = $modifyLinguisticRequest;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn
     */
    public function getModifyLinguisticRequest() : ?\OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn
    {
        return $this->modifyLinguisticRequest;
    }

    /**
     * @return bool
     */
    public function hasModifyLinguisticRequest() : bool
    {
        return !empty($this->modifyLinguisticRequest);
    }

    /**
     * @param null | string $applicationName
     * @return $this
     */
    public function setApplicationName(?string $applicationName) : static
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getApplicationName() : ?string
    {
        return $this->applicationName;
    }

    /**
     * @return bool
     */
    public function hasApplicationName() : bool
    {
        return !empty($this->applicationName);
    }
}

