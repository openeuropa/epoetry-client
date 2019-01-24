<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class RequestGeneralInfo
{
    /**
     * @var string
     */
    private $accessibleTo;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $decideReference;

    /**
     * @var string
     */
    private $destinationCode;

    /**
     * @var bool
     */
    private $documentToBeAdopted;

    /**
     * @var string
     */
    private $internalReference;

    /**
     * @var string
     */
    private $internalTechnicalId;

    /**
     * @var string
     */
    private $onBehalfOf;

    /**
     * @var \DateTime
     */
    private $requestedDeadline;

    /**
     * @var string
     */
    private $requestingService;

    /**
     * @var bool
     */
    private $sensitive;

    /**
     * @var bool
     */
    private $sentViaRUE;

    /**
     * @var string
     */
    private $serviceOfOrigin;

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
    private $title;

    /**
     * @return string
     */
    public function getAccessibleTo(): string
    {
        return $this->accessibleTo;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return string
     */
    public function getDecideReference(): string
    {
        return $this->decideReference;
    }

    /**
     * @return string
     */
    public function getDestinationCode(): string
    {
        return $this->destinationCode;
    }

    /**
     * @return string
     */
    public function getInternalReference(): string
    {
        return $this->internalReference;
    }

    /**
     * @return string
     */
    public function getInternalTechnicalId(): string
    {
        return $this->internalTechnicalId;
    }

    /**
     * @return string
     */
    public function getOnBehalfOf(): string
    {
        return $this->onBehalfOf;
    }

    /**
     * @return \DateTime
     */
    public function getRequestedDeadline(): \DateTime
    {
        return $this->requestedDeadline;
    }

    /**
     * @return string
     */
    public function getRequestingService(): string
    {
        return $this->requestingService;
    }

    /**
     * @return string
     */
    public function getServiceOfOrigin(): string
    {
        return $this->serviceOfOrigin;
    }

    /**
     * @return string
     */
    public function getSlaAnnex(): string
    {
        return $this->slaAnnex;
    }

    /**
     * @return string
     */
    public function getSlaCommitment(): string
    {
        return $this->slaCommitment;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function isDocumentToBeAdopted(): bool
    {
        return $this->documentToBeAdopted;
    }

    /**
     * @return bool
     */
    public function isSensitive(): bool
    {
        return $this->sensitive;
    }

    /**
     * @return bool
     */
    public function isSentViaRUE(): bool
    {
        return $this->sentViaRUE;
    }

    /**
     * @param string $accessibleTo
     *
     * @return $this
     */
    public function setAccessibleTo(string $accessibleTo): RequestGeneralInfo
    {
        $this->accessibleTo = $accessibleTo;

        return $this;
    }

    /**
     * @param string $comment
     *
     * @return $this
     */
    public function setComment(string $comment): RequestGeneralInfo
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @param string $decideReference
     *
     * @return $this
     */
    public function setDecideReference(string $decideReference): RequestGeneralInfo
    {
        $this->decideReference = $decideReference;

        return $this;
    }

    /**
     * @param string $destinationCode
     *
     * @return $this
     */
    public function setDestinationCode(string $destinationCode): RequestGeneralInfo
    {
        $this->destinationCode = $destinationCode;

        return $this;
    }

    /**
     * @param bool $documentToBeAdopted
     *
     * @return $this
     */
    public function setDocumentToBeAdopted(bool $documentToBeAdopted): RequestGeneralInfo
    {
        $this->documentToBeAdopted = $documentToBeAdopted;

        return $this;
    }

    /**
     * @param string $internalReference
     *
     * @return $this
     */
    public function setInternalReference(string $internalReference): RequestGeneralInfo
    {
        $this->internalReference = $internalReference;

        return $this;
    }

    /**
     * @param string $internalTechnicalId
     *
     * @return $this
     */
    public function setInternalTechnicalId(string $internalTechnicalId): RequestGeneralInfo
    {
        $this->internalTechnicalId = $internalTechnicalId;

        return $this;
    }

    /**
     * @param string $onBehalfOf
     *
     * @return $this
     */
    public function setOnBehalfOf(string $onBehalfOf): RequestGeneralInfo
    {
        $this->onBehalfOf = $onBehalfOf;

        return $this;
    }

    /**
     * @param \DateTime $requestedDeadline
     *
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline): RequestGeneralInfo
    {
        $this->requestedDeadline = $requestedDeadline;

        return $this;
    }

    /**
     * @param string $requestingService
     *
     * @return $this
     */
    public function setRequestingService(string $requestingService): RequestGeneralInfo
    {
        $this->requestingService = $requestingService;

        return $this;
    }

    /**
     * @param bool $sensitive
     *
     * @return $this
     */
    public function setSensitive(bool $sensitive): RequestGeneralInfo
    {
        $this->sensitive = $sensitive;

        return $this;
    }

    /**
     * @param bool $sentViaRUE
     *
     * @return $this
     */
    public function setSentViaRUE(bool $sentViaRUE): RequestGeneralInfo
    {
        $this->sentViaRUE = $sentViaRUE;

        return $this;
    }

    /**
     * @param string $serviceOfOrigin
     *
     * @return $this
     */
    public function setServiceOfOrigin(string $serviceOfOrigin): RequestGeneralInfo
    {
        $this->serviceOfOrigin = $serviceOfOrigin;

        return $this;
    }

    /**
     * @param string $slaAnnex
     *
     * @return $this
     */
    public function setSlaAnnex(string $slaAnnex): RequestGeneralInfo
    {
        $this->slaAnnex = $slaAnnex;

        return $this;
    }

    /**
     * @param string $slaCommitment
     *
     * @return $this
     */
    public function setSlaCommitment(string $slaCommitment): RequestGeneralInfo
    {
        $this->slaCommitment = $slaCommitment;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title): RequestGeneralInfo
    {
        $this->title = $title;

        return $this;
    }
}
