<?php

namespace OpenEuropa\EPoetry\Type;

class RequestGeneralInfo
{

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $internalReference;

    /**
     * @var string
     */
    private $internalTechnicalId;

    /**
     * @var \DateTime
     */
    private $requestedDeadline;

    /**
     * @var bool
     */
    private $sensitive;

    /**
     * @var bool
     */
    private $documentToBeAdopted;

    /**
     * @var string
     */
    private $decideReference;

    /**
     * @var bool
     */
    private $sentViaRUE;

    /**
     * @var string
     */
    private $destinationCode;

    /**
     * @var string
     */
    private $slaAnnex;

    /**
     * @var string
     */
    private $slaCommitment;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $onBehalfOf;

    /**
     * @var string
     */
    private $accessibleTo;

    /**
     * @var string
     */
    private $requestingService;

    /**
     * @var string
     */
    private $serviceOfOrigin;

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalReference() : string
    {
        return $this->internalReference;
    }

    /**
     * @param string $internalReference
     * @return $this
     */
    public function setInternalReference(string $internalReference) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->internalReference = $internalReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalTechnicalId() : string
    {
        return $this->internalTechnicalId;
    }

    /**
     * @param string $internalTechnicalId
     * @return $this
     */
    public function setInternalTechnicalId(string $internalTechnicalId) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->internalTechnicalId = $internalTechnicalId;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRequestedDeadline() : \DateTime
    {
        return $this->requestedDeadline;
    }

    /**
     * @param \DateTime $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSensitive() : bool
    {
        return $this->sensitive;
    }

    /**
     * @param bool $sensitive
     * @return $this
     */
    public function setSensitive(bool $sensitive) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->sensitive = $sensitive;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDocumentToBeAdopted() : bool
    {
        return $this->documentToBeAdopted;
    }

    /**
     * @param bool $documentToBeAdopted
     * @return $this
     */
    public function setDocumentToBeAdopted(bool $documentToBeAdopted) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->documentToBeAdopted = $documentToBeAdopted;
        return $this;
    }

    /**
     * @return string
     */
    public function getDecideReference() : string
    {
        return $this->decideReference;
    }

    /**
     * @param string $decideReference
     * @return $this
     */
    public function setDecideReference(string $decideReference) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->decideReference = $decideReference;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSentViaRUE() : bool
    {
        return $this->sentViaRUE;
    }

    /**
     * @param bool $sentViaRUE
     * @return $this
     */
    public function setSentViaRUE(bool $sentViaRUE) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->sentViaRUE = $sentViaRUE;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestinationCode() : string
    {
        return $this->destinationCode;
    }

    /**
     * @param string $destinationCode
     * @return $this
     */
    public function setDestinationCode(string $destinationCode) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->destinationCode = $destinationCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlaAnnex() : string
    {
        return $this->slaAnnex;
    }

    /**
     * @param string $slaAnnex
     * @return $this
     */
    public function setSlaAnnex(string $slaAnnex) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->slaAnnex = $slaAnnex;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlaCommitment() : string
    {
        return $this->slaCommitment;
    }

    /**
     * @param string $slaCommitment
     * @return $this
     */
    public function setSlaCommitment(string $slaCommitment) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->slaCommitment = $slaCommitment;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment() : string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment(string $comment) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getOnBehalfOf() : string
    {
        return $this->onBehalfOf;
    }

    /**
     * @param string $onBehalfOf
     * @return $this
     */
    public function setOnBehalfOf(string $onBehalfOf) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->onBehalfOf = $onBehalfOf;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessibleTo() : string
    {
        return $this->accessibleTo;
    }

    /**
     * @param string $accessibleTo
     * @return $this
     */
    public function setAccessibleTo(string $accessibleTo) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->accessibleTo = $accessibleTo;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestingService() : string
    {
        return $this->requestingService;
    }

    /**
     * @param string $requestingService
     * @return $this
     */
    public function setRequestingService(string $requestingService) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->requestingService = $requestingService;
        return $this;
    }

    /**
     * @return string
     */
    public function getServiceOfOrigin() : string
    {
        return $this->serviceOfOrigin;
    }

    /**
     * @param string $serviceOfOrigin
     * @return $this
     */
    public function setServiceOfOrigin(string $serviceOfOrigin) : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        $this->serviceOfOrigin = $serviceOfOrigin;
        return $this;
    }
}
