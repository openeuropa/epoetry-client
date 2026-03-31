<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class AddNewPartToDossier implements RequestInterface
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    private $dossier = null;

    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    private $requestDetails = null;

    /**
     * @var null | string
     */
    private $applicationName = null;

    /**
     * @var null | string
     */
    private $templateName = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\DossierReference $dossier
     * @return $this
     */
    public function setDossier(?\OpenEuropa\EPoetry\Request\Type\DossierReference $dossier): static
    {
        $this->dossier = $dossier;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    public function getDossier(): ?\OpenEuropa\EPoetry\Request\Type\DossierReference
    {
        return $this->dossier;
    }

    /**
     * @return bool
     */
    public function hasDossier(): bool
    {
        return !empty($this->dossier);
    }

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails
     * @return $this
     */
    public function setRequestDetails(?\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn $requestDetails): static
    {
        $this->requestDetails = $requestDetails;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
     */
    public function getRequestDetails(): ?\OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        return $this->requestDetails;
    }

    /**
     * @return bool
     */
    public function hasRequestDetails(): bool
    {
        return !empty($this->requestDetails);
    }

    /**
     * @param null | string $applicationName
     * @return $this
     */
    public function setApplicationName(?string $applicationName): static
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getApplicationName(): ?string
    {
        return $this->applicationName;
    }

    /**
     * @return bool
     */
    public function hasApplicationName(): bool
    {
        return !empty($this->applicationName);
    }

    /**
     * @param null | string $templateName
     * @return $this
     */
    public function setTemplateName(?string $templateName): static
    {
        $this->templateName = $templateName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getTemplateName(): ?string
    {
        return $this->templateName;
    }

    /**
     * @return bool
     */
    public function hasTemplateName(): bool
    {
        return !empty($this->templateName);
    }
}

