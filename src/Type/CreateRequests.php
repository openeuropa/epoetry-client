<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class CreateRequests
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequestIn[]
     */
    private $linguisticRequest;

    /**
     * @var \OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    private $relatedRequest;

    /**
     * @var string
     */
    private $templateName;

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequestIn $linguisticRequest
     *
     * @return $this
     */
    public function addLinguisticRequest(LinguisticRequestIn $linguisticRequest): self
    {
        $this->linguisticRequest = \is_array($this->linguisticRequest) ? $this->linguisticRequest : [];
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
     * @return \OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    public function getRelatedRequest(): RequestReferenceIn
    {
        return $this->relatedRequest;
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
