<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ModifyRequest implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequestIn
     */
    protected $linguisticRequest;

    /**
     * @var \OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    protected $requestReference;

    /**
     * @var string
     */
    protected $templateName;

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticRequestIn
     */
    public function getLinguisticRequest(): LinguisticRequestIn
    {
        return $this->linguisticRequest;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    public function getRequestReference(): RequestReferenceIn
    {
        return $this->requestReference;
    }

    /**
     * @return string
     */
    public function getTemplateName(): string
    {
        return $this->templateName;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequestIn $linguisticRequest
     *
     * @return $this
     */
    public function setLinguisticRequest($linguisticRequest): ModifyRequest
    {
        $this->linguisticRequest = $linguisticRequest;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestReferenceIn $requestReference
     *
     * @return $this
     */
    public function setRequestReference($requestReference): ModifyRequest
    {
        $this->requestReference = $requestReference;

        return $this;
    }

    /**
     * @param string $templateName
     *
     * @return $this
     */
    public function setTemplateName(string $templateName): ModifyRequest
    {
        $this->templateName = $templateName;

        return $this;
    }
}
