<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateRequests implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequestIn[]
     */
    protected $linguisticRequest = [];

    /**
     * @var \OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    protected $relatedRequest;

    /**
     * @var string
     */
    protected $templateName;

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequestIn $linguisticRequest
     *
     * @return $this
     */
    public function addLinguisticRequest($linguisticRequest): CreateRequests
    {
        $this->linguisticRequest[] = $linguisticRequest;

        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticRequestIn[]
     */
    public function getLinguisticRequest(): array
    {
        return $this->linguisticRequest;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    public function getRelatedRequest(): ?\OpenEuropa\EPoetry\Type\RequestReferenceIn
    {
        return $this->relatedRequest;
    }

    /**
     * @return null|string
     */
    public function getTemplateName(): ?string
    {
        return $this->templateName;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequestIn $linguisticRequest
     *
     * @return $this
     */
    public function setLinguisticRequest($linguisticRequest): CreateRequests
    {
        $this->linguisticRequest = $linguisticRequest;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestReferenceIn $relatedRequest
     *
     * @return $this
     */
    public function setRelatedRequest($relatedRequest): CreateRequests
    {
        $this->relatedRequest = $relatedRequest;

        return $this;
    }

    /**
     * @param string $templateName
     *
     * @return $this
     */
    public function setTemplateName(string $templateName): CreateRequests
    {
        $this->templateName = $templateName;

        return $this;
    }
}
