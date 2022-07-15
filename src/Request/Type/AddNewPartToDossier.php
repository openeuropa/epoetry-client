<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class AddNewPartToDossier implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    private $dossier;

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
     * @var \OpenEuropa\EPoetry\Request\Type\DossierReference $dossier
     * @var \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @var string $applicationName
     * @var string $templateName
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\DossierReference $dossier, \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails, string $applicationName, string $templateName)
    {
        $this->dossier = $dossier;
        $this->requestDetails = $requestDetails;
        $this->applicationName = $applicationName;
        $this->templateName = $templateName;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DossierReference $dossier
     * @return $this
     */
    public function setDossier($dossier) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier
    {
        $this->dossier = $dossier;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    public function getDossier() : \OpenEuropa\EPoetry\Request\Type\DossierReference
    {
        return $this->dossier;
    }

    /**
     * @return bool
     */
    public function hasDossier() : bool
    {
        return !empty($this->dossier);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @return $this
     */
    public function setRequestDetails($requestDetails) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    public function getRequestDetails() : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
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
    public function setApplicationName(string $applicationName) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier
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
    public function setTemplateName(string $templateName) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier
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

