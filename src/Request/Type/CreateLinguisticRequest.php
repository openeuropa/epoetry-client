<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateLinguisticRequest implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    private $requestDetails;

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
     * @var \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @var string $applicationName
     * @var string $templateName
     */
    public function __construct($requestDetails, $applicationName, $templateName)
    {
        $this->requestDetails = $requestDetails;
        $this->applicationName = $applicationName;
        $this->templateName = $templateName;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    public function getRequestDetails()
    {
        return $this->requestDetails;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @return CreateLinguisticRequest
     */
    public function withRequestDetails($requestDetails)
    {
        $new = clone $this;
        $new->requestDetails = $requestDetails;

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
     * @return CreateLinguisticRequest
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
     * @return CreateLinguisticRequest
     */
    public function withTemplateName($templateName)
    {
        $new = clone $this;
        $new->templateName = $templateName;

        return $new;
    }
}

