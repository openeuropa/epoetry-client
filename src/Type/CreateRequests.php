<?php

namespace OpenEuropa\EPoetry\Type;

class CreateRequests
{

    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequestIn
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
    public function setLinguisticRequest($linguisticRequest) : \OpenEuropa\EPoetry\Type\CreateRequests
    {
        $this->linguisticRequest = $linguisticRequest;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\RequestReferenceIn
     */
    public function getRelatedRequest() : \OpenEuropa\EPoetry\Type\RequestReferenceIn
    {
        return $this->relatedRequest;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestReferenceIn $relatedRequest
     * @return $this
     */
    public function setRelatedRequest($relatedRequest) : \OpenEuropa\EPoetry\Type\CreateRequests
    {
        $this->relatedRequest = $relatedRequest;
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
    public function setTemplateName(string $templateName) : \OpenEuropa\EPoetry\Type\CreateRequests
    {
        $this->templateName = $templateName;
        return $this;
    }


}

