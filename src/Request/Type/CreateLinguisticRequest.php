<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateLinguisticRequest implements RequestInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    private $requestDetails;

    /**
     * @var null|string
     */
    private $applicationName;

    /**
     * @var null|string
     */
    private $templateName;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @var string $applicationName
     * @var string $templateName
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails, string $applicationName, string $templateName)
    {
        $this->requestDetails = $requestDetails;
        $this->applicationName = $applicationName;
        $this->templateName = $templateName;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @return $this
     */
    public function setRequestDetails($requestDetails) : \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn|null
     */
    public function getRequestDetails() : ?\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        return $this->requestDetails;
    }

    /**
     * @return bool
     */
    public function hasRequestDetails() : bool
    {
        return !empty($this->requestDetails);
    }

    /**
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName) : \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return string|null
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
     * @param string $templateName
     * @return $this
     */
    public function setTemplateName(string $templateName) : \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest
    {
        $this->templateName = $templateName;
        return $this;
    }

    /**
     * @return string|null
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

