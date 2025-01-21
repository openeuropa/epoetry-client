<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ResubmitRequest implements RequestInterface
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    private $resubmitRequest = null;

    /**
     * @var null | string
     */
    private $applicationName = null;

    /**
     * @var null | string
     */
    private $templateName = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $resubmitRequest
     * @return $this
     */
    public function setResubmitRequest(?\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $resubmitRequest) : static
    {
        $this->resubmitRequest = $resubmitRequest;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    public function getResubmitRequest() : ?\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
    {
        return $this->resubmitRequest;
    }

    /**
     * @return bool
     */
    public function hasResubmitRequest() : bool
    {
        return !empty($this->resubmitRequest);
    }

    /**
     * @param null | string $applicationName
     * @return $this
     */
    public function setApplicationName(?string $applicationName) : static
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getApplicationName() : ?string
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

    /**
     * @param null | string $templateName
     * @return $this
     */
    public function setTemplateName(?string $templateName) : static
    {
        $this->templateName = $templateName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getTemplateName() : ?string
    {
        return $this->templateName;
    }

    /**
     * @return bool
     */
    public function hasTemplateName() : bool
    {
        return !empty($this->templateName);
    }
}

