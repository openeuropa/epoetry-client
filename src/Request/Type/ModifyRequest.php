<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ModifyRequest implements RequestInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    protected $linguisticRequest;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    protected $requestReference;

    /**
     * @var null|string
     */
    protected $templateName;

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    public function getLinguisticRequest(): ?LinguisticRequestIn
    {
        return $this->linguisticRequest;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    public function getRequestReference(): ?RequestReferenceIn
    {
        return $this->requestReference;
    }

    /**
     * @return null|string
     */
    public function getTemplateName(): ?string
    {
        return $this->templateName;
    }

    /**
     * @return bool
     */
    public function hasLinguisticRequest(): bool
    {
        return !empty($this->linguisticRequest);
    }

    /**
     * @return bool
     */
    public function hasRequestReference(): bool
    {
        return !empty($this->requestReference);
    }

    /**
     * @return bool
     */
    public function hasTemplateName(): bool
    {
        return !empty($this->templateName);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $linguisticRequest
     *
     * @return $this
     */
    public function setLinguisticRequest($linguisticRequest): ModifyRequest
    {
        $this->linguisticRequest = $linguisticRequest;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $requestReference
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
