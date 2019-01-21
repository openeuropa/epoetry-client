<?php

namespace OpenEuropa\EPoetry\Type;

class RequestGeneralInfoIn
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
     * @var \OpenEuropa\EPoetry\Type\Destination
     */
    private $destinationCode;

    /**
     * @var \OpenEuropa\EPoetry\Type\SlaAnnex
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
     * @var \OpenEuropa\EPoetry\Type\AccessLevel
     */
    private $accessibleTo;

    /**
     * Constructor
     *
     * @var string $title
     * @var string $internalReference
     * @var string $internalTechnicalId
     * @var \DateTime $requestedDeadline
     * @var bool $sensitive
     * @var bool $documentToBeAdopted
     * @var string $decideReference
     * @var bool $sentViaRUE
     * @var \OpenEuropa\EPoetry\Type\Destination $destinationCode
     * @var \OpenEuropa\EPoetry\Type\SlaAnnex $slaAnnex
     * @var string $slaCommitment
     * @var string $comment
     * @var string $onBehalfOf
     * @var \OpenEuropa\EPoetry\Type\AccessLevel $accessibleTo
     */
    public function __construct(string $title, string $internalReference, string $internalTechnicalId, \DateTime $requestedDeadline, bool $sensitive, bool $documentToBeAdopted, string $decideReference, bool $sentViaRUE, \OpenEuropa\EPoetry\Type\Destination $destinationCode, \OpenEuropa\EPoetry\Type\SlaAnnex $slaAnnex, string $slaCommitment, string $comment, string $onBehalfOf, \OpenEuropa\EPoetry\Type\AccessLevel $accessibleTo)
    {
        $this->title = $title;
        $this->internalReference = $internalReference;
        $this->internalTechnicalId = $internalTechnicalId;
        $this->requestedDeadline = $requestedDeadline;
        $this->sensitive = $sensitive;
        $this->documentToBeAdopted = $documentToBeAdopted;
        $this->decideReference = $decideReference;
        $this->sentViaRUE = $sentViaRUE;
        $this->destinationCode = $destinationCode;
        $this->slaAnnex = $slaAnnex;
        $this->slaCommitment = $slaCommitment;
        $this->comment = $comment;
        $this->onBehalfOf = $onBehalfOf;
        $this->accessibleTo = $accessibleTo;
    }

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
    public function setTitle(string $title) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setInternalReference(string $internalReference) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setInternalTechnicalId(string $internalTechnicalId) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setRequestedDeadline($requestedDeadline) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setSensitive(bool $sensitive) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setDocumentToBeAdopted(bool $documentToBeAdopted) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setDecideReference(string $decideReference) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setSentViaRUE(bool $sentViaRUE) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
    {
        $this->sentViaRUE = $sentViaRUE;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\Destination
     */
    public function getDestinationCode() : \OpenEuropa\EPoetry\Type\Destination
    {
        return $this->destinationCode;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\Destination $destinationCode
     * @return $this
     */
    public function setDestinationCode($destinationCode) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
    {
        $this->destinationCode = $destinationCode;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\SlaAnnex
     */
    public function getSlaAnnex() : \OpenEuropa\EPoetry\Type\SlaAnnex
    {
        return $this->slaAnnex;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\SlaAnnex $slaAnnex
     * @return $this
     */
    public function setSlaAnnex($slaAnnex) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setSlaCommitment(string $slaCommitment) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setComment(string $comment) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
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
    public function setOnBehalfOf(string $onBehalfOf) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
    {
        $this->onBehalfOf = $onBehalfOf;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\AccessLevel
     */
    public function getAccessibleTo() : \OpenEuropa\EPoetry\Type\AccessLevel
    {
        return $this->accessibleTo;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\AccessLevel $accessibleTo
     * @return $this
     */
    public function setAccessibleTo($accessibleTo) : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
    {
        $this->accessibleTo = $accessibleTo;
        return $this;
    }
}
