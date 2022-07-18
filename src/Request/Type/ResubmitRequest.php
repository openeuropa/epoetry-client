<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ResubmitRequest implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    private $resubmitRequest;

    /**
     * @var string
     */
    private $applicationName;

    /**
     * @var string
     */
    private $templateName;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $resubmitRequest
     * @return $this
     */
    public function setResubmitRequest(\OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $resubmitRequest) : \OpenEuropa\EPoetry\Request\Type\ResubmitRequest
    {
        $this->resubmitRequest = $resubmitRequest;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    public function getResubmitRequest() : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
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
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName) : \OpenEuropa\EPoetry\Request\Type\ResubmitRequest
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationName() : string
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
     * @param string $templateName
     * @return $this
     */
    public function setTemplateName(string $templateName) : \OpenEuropa\EPoetry\Request\Type\ResubmitRequest
    {
        $this->templateName = $templateName;
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
     * @return bool
     */
    public function hasTemplateName() : bool
    {
        return !empty($this->templateName);
    }
}

