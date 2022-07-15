<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateNewVersion implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    private $linguisticRequest;

    /**
     * @var string
     */
    private $applicationName;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $linguisticRequest
     * @var string $applicationName
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $linguisticRequest, string $applicationName)
    {
        $this->linguisticRequest = $linguisticRequest;
        $this->applicationName = $applicationName;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $linguisticRequest
     * @return $this
     */
    public function setLinguisticRequest(\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $linguisticRequest) : \OpenEuropa\EPoetry\Request\Type\CreateNewVersion
    {
        $this->linguisticRequest = $linguisticRequest;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    public function getLinguisticRequest() : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
    {
        return $this->linguisticRequest;
    }

    /**
     * @return bool
     */
    public function hasLinguisticRequest() : bool
    {
        return !empty($this->linguisticRequest);
    }

    /**
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName) : \OpenEuropa\EPoetry\Request\Type\CreateNewVersion
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationName() : string
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

