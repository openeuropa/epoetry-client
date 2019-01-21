<?php

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ModifyRequest implements RequestInterface
{

    /**
     * @var \OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    private $requestReference;

    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequestIn
     */
    private $linguisticRequest;

    /**
     * @var string
     */
    private $templateName;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\RequestReferenceIn $requestReference
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequestIn $linguisticRequest
     * @var string $templateName
     */
    public function __construct(\OpenEuropa\EPoetry\Type\RequestReferenceIn $requestReference, \OpenEuropa\EPoetry\Type\LinguisticRequestIn $linguisticRequest, string $templateName)
    {
        $this->requestReference = $requestReference;
        $this->linguisticRequest = $linguisticRequest;
        $this->templateName = $templateName;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    public function getRequestReference() : \OpenEuropa\EPoetry\Type\RequestReferenceIn
    {
        return $this->requestReference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestReferenceIn $requestReference
     * @return $this
     */
    public function setRequestReference($requestReference) : \OpenEuropa\EPoetry\Type\ModifyRequest
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticRequestIn
     */
    public function getLinguisticRequest() : \OpenEuropa\EPoetry\Type\LinguisticRequestIn
    {
        return $this->linguisticRequest;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequestIn $linguisticRequest
     * @return $this
     */
    public function setLinguisticRequest($linguisticRequest) : \OpenEuropa\EPoetry\Type\ModifyRequest
    {
        $this->linguisticRequest = $linguisticRequest;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplateName() : string
    {
        return $this->templateName;
    }

    /**
     * @param string $templateName
     * @return $this
     */
    public function setTemplateName(string $templateName) : \OpenEuropa\EPoetry\Type\ModifyRequest
    {
        $this->templateName = $templateName;
        return $this;
    }
}
