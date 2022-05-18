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
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn $modifyLinguisticRequest
     * @var string $applicationName
     */
    public function __construct($modifyLinguisticRequest, $applicationName)
    {
        $this->modifyLinguisticRequest = $modifyLinguisticRequest;
        $this->applicationName = $applicationName;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn
     */
    public function getModifyLinguisticRequest()
    {
        return $this->modifyLinguisticRequest;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyLinguisticRequestIn $modifyLinguisticRequest
     * @return ModifyLinguisticRequest
     */
    public function withModifyLinguisticRequest($modifyLinguisticRequest)
    {
        $new = clone $this;
        $new->modifyLinguisticRequest = $modifyLinguisticRequest;

        return $new;
    }

    /**
     * @return string
     */
    public function getApplicationName()
    {
        return $this->applicationName;
    }

    /**
     * @param string $applicationName
     * @return ModifyLinguisticRequest
     */
    public function withApplicationName($applicationName)
    {
        $new = clone $this;
        $new->applicationName = $applicationName;

        return $new;
    }
}

