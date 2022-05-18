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
    public function __construct($linguisticRequest, $applicationName)
    {
        $this->linguisticRequest = $linguisticRequest;
        $this->applicationName = $applicationName;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    public function getLinguisticRequest()
    {
        return $this->linguisticRequest;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $linguisticRequest
     * @return CreateNewVersion
     */
    public function withLinguisticRequest($linguisticRequest)
    {
        $new = clone $this;
        $new->linguisticRequest = $linguisticRequest;

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
     * @return CreateNewVersion
     */
    public function withApplicationName($applicationName)
    {
        $new = clone $this;
        $new->applicationName = $applicationName;

        return $new;
    }
}

