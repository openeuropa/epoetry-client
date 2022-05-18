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
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $resubmitRequest
     * @var string $applicationName
     * @var string $templateName
     */
    public function __construct($resubmitRequest, $applicationName, $templateName)
    {
        $this->resubmitRequest = $resubmitRequest;
        $this->applicationName = $applicationName;
        $this->templateName = $templateName;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn
     */
    public function getResubmitRequest()
    {
        return $this->resubmitRequest;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticRequestIn $resubmitRequest
     * @return ResubmitRequest
     */
    public function withResubmitRequest($resubmitRequest)
    {
        $new = clone $this;
        $new->resubmitRequest = $resubmitRequest;

        return $new;
    }

    /**
     * @return string
     */
    public function getApplicationName()
    {
        return $this->applicationName;
    }

    /**
     * @param string $applicationName
     * @return ResubmitRequest
     */
    public function withApplicationName($applicationName)
    {
        $new = clone $this;
        $new->applicationName = $applicationName;

        return $new;
    }

    /**
     * @return string
     */
    public function getTemplateName()
    {
        return $this->templateName;
    }

    /**
     * @param string $templateName
     * @return ResubmitRequest
     */
    public function withTemplateName($templateName)
    {
        $new = clone $this;
        $new->templateName = $templateName;

        return $new;
    }
}

