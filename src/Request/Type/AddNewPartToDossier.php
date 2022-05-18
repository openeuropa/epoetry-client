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
    public function __construct($dossier, $requestDetails, $applicationName, $templateName)
    {
        $this->dossier = $dossier;
        $this->requestDetails = $requestDetails;
        $this->applicationName = $applicationName;
        $this->templateName = $templateName;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    public function getDossier()
    {
        return $this->dossier;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DossierReference $dossier
     * @return AddNewPartToDossier
     */
    public function withDossier($dossier)
    {
        $new = clone $this;
        $new->dossier = $dossier;

        return $new;
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
     * @return AddNewPartToDossier
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
     * @return AddNewPartToDossier
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
     * @return AddNewPartToDossier
     */
    public function withTemplateName($templateName)
    {
        $new = clone $this;
        $new->templateName = $templateName;

        return $new;
    }
}

