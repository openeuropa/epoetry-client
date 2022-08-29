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
     * @param \OpenEuropa\EPoetry\Request\Type\DossierReference|null $dossier
     * @return $this
     */
    public function setDossier(?\OpenEuropa\EPoetry\Request\Type\DossierReference $dossier) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier
    {
        $this->dossier = $dossier;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DossierReference|null
     */
    public function getDossier() : ?\OpenEuropa\EPoetry\Request\Type\DossierReference
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
     * @param \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn|null $requestDetails
     * @return $this
     */
    public function setRequestDetails(?\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier
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
     * @param string|null $applicationName
     * @return $this
     */
    public function setApplicationName(?string $applicationName) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier
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
     * @param string|null $templateName
     * @return $this
     */
    public function setTemplateName(?string $templateName) : \OpenEuropa\EPoetry\Request\Type\AddNewPartToDossier
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

