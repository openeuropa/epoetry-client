<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ModifyLinguisticRequest implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn
     */
    private $modifyLinguisticRequest;

    /**
     * @var string
     */
    private $applicationName;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn|null $modifyLinguisticRequest
     * @return $this
     */
    public function setModifyLinguisticRequest(?\OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn $modifyLinguisticRequest) : \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequest
    {
        $this->modifyLinguisticRequest = $modifyLinguisticRequest;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn|null
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
     * @param string|null $applicationName
     * @return $this
     */
    public function setApplicationName(?string $applicationName) : \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequest
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return string|null
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

