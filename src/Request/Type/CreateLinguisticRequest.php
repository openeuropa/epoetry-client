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
     * @param \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @return $this
     */
    public function setRequestDetails(\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails) : \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequest
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

