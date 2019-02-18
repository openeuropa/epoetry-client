<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateRequests implements RequestInterface
{
    /**
     * @var array|\OpenEuropa\EPoetry\Type\LinguisticRequestIn[]
     */
    protected $linguisticRequest = [];

    /**
     * @var null|\OpenEuropa\EPoetry\Type\RequestReferenceIn
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
     * @return array|\OpenEuropa\EPoetry\Type\LinguisticRequestIn[]
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
     * @return bool
     */
    public function hasLinguisticRequest(): bool
    {
        if (\is_array($this->linguisticRequest)) {
            return !empty($this->linguisticRequest);
        }

        return isset($this->linguisticRequest);
    }

    /**
     * @return bool
     */
    public function hasRelatedRequest(): bool
    {
        if (\is_array($this->relatedRequest)) {
            return !empty($this->relatedRequest);
        }

        return isset($this->relatedRequest);
    }

    /**
     * @return bool
     */
    public function hasTemplateName(): bool
    {
        if (\is_array($this->templateName)) {
            return !empty($this->templateName);
        }

        return isset($this->templateName);
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
