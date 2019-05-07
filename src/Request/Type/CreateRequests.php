<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateRequests implements RequestInterface
{
    /**
     * @var array|\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn[]
     */
    protected $linguisticRequest = [];

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    protected $relatedRequest;

    /**
     * @var null|string
     */
    protected $templateName;

    /**
     * @param LinguisticRequestIn ...$linguisticRequests
     *
     * @return $this
     */
    public function addLinguisticRequest(...$linguisticRequests): CreateRequests
    {
        $this->linguisticRequest = array_merge($this->linguisticRequest, $linguisticRequests);

        return $this;
    }

    /**
     * @return array|\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn[]
     */
    public function getLinguisticRequest(): array
    {
        return $this->linguisticRequest;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\RequestReferenceIn
     */
    public function getRelatedRequest(): ?RequestReferenceIn
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
     * @return bool
     */
    public function hasLinguisticRequest(): bool
    {
        return !empty($this->linguisticRequest);
    }

    /**
     * @return bool
     */
    public function hasRelatedRequest(): bool
    {
        return !empty($this->relatedRequest);
    }

    /**
     * @return bool
     */
    public function hasTemplateName(): bool
    {
        return !empty($this->templateName);
    }

    /**
     * @param LinguisticRequestIn[] $linguisticRequest
     *
     * @return $this
     */
    public function setLinguisticRequest(array $linguisticRequest): CreateRequests
    {
        $this->linguisticRequest = $linguisticRequest;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceIn $relatedRequest
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
