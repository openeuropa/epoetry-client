<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class RequestGeneralInfo
{
    /**
     * @var null|string
     */
    protected $accessibleTo;

    /**
     * @var null|string
     */
    protected $comment;

    /**
     * @var null|string
     */
    protected $decideReference;

    /**
     * @var null|string
     */
    protected $destinationCode;

    /**
     * @var null|bool
     */
    protected $documentToBeAdopted;

    /**
     * @var null|string
     */
    protected $internalReference;

    /**
     * @var null|string
     */
    protected $internalTechnicalId;

    /**
     * @var null|string
     */
    protected $onBehalfOf;

    /**
     * @var null|\DateTimeInterface
     */
    protected $requestedDeadline;

    /**
     * @var null|string
     */
    protected $requestingService;

    /**
     * @var null|bool
     */
    protected $sensitive;

    /**
     * @var null|bool
     */
    protected $sentViaRUE;

    /**
     * @var null|string
     */
    protected $serviceOfOrigin;

    /**
     * @var null|string
     */
    protected $slaAnnex;

    /**
     * @var null|string
     */
    protected $slaCommitment;

    /**
     * @var null|string
     */
    protected $title;

    /**
     * @return null|string
     */
    public function getAccessibleTo(): ?string
    {
        return $this->accessibleTo;
    }

    /**
     * @return null|string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return null|string
     */
    public function getDecideReference(): ?string
    {
        return $this->decideReference;
    }

    /**
     * @return null|string
     */
    public function getDestinationCode(): ?string
    {
        return $this->destinationCode;
    }

    /**
     * @return null|string
     */
    public function getInternalReference(): ?string
    {
        return $this->internalReference;
    }

    /**
     * @return null|string
     */
    public function getInternalTechnicalId(): ?string
    {
        return $this->internalTechnicalId;
    }

    /**
     * @return null|string
     */
    public function getOnBehalfOf(): ?string
    {
        return $this->onBehalfOf;
    }

    /**
     * @return null|\DateTimeInterface
     */
    public function getRequestedDeadline(): ?\DateTimeInterface
    {
        return $this->requestedDeadline;
    }

    /**
     * @return null|string
     */
    public function getRequestingService(): ?string
    {
        return $this->requestingService;
    }

    /**
     * @return null|string
     */
    public function getServiceOfOrigin(): ?string
    {
        return $this->serviceOfOrigin;
    }

    /**
     * @return null|string
     */
    public function getSlaAnnex(): ?string
    {
        return $this->slaAnnex;
    }

    /**
     * @return null|string
     */
    public function getSlaCommitment(): ?string
    {
        return $this->slaCommitment;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function hasAccessibleTo(): bool
    {
        return !empty($this->accessibleTo);
    }

    /**
     * @return bool
     */
    public function hasComment(): bool
    {
        return !empty($this->comment);
    }

    /**
     * @return bool
     */
    public function hasDecideReference(): bool
    {
        return !empty($this->decideReference);
    }

    /**
     * @return bool
     */
    public function hasDestinationCode(): bool
    {
        return !empty($this->destinationCode);
    }

    /**
     * @return bool
     */
    public function hasDocumentToBeAdopted(): bool
    {
        return !empty($this->documentToBeAdopted);
    }

    /**
     * @return bool
     */
    public function hasInternalReference(): bool
    {
        return !empty($this->internalReference);
    }

    /**
     * @return bool
     */
    public function hasInternalTechnicalId(): bool
    {
        return !empty($this->internalTechnicalId);
    }

    /**
     * @return bool
     */
    public function hasOnBehalfOf(): bool
    {
        return !empty($this->onBehalfOf);
    }

    /**
     * @return bool
     */
    public function hasRequestedDeadline(): bool
    {
        return !empty($this->requestedDeadline);
    }

    /**
     * @return bool
     */
    public function hasRequestingService(): bool
    {
        return !empty($this->requestingService);
    }

    /**
     * @return bool
     */
    public function hasSensitive(): bool
    {
        return !empty($this->sensitive);
    }

    /**
     * @return bool
     */
    public function hasSentViaRUE(): bool
    {
        return !empty($this->sentViaRUE);
    }

    /**
     * @return bool
     */
    public function hasServiceOfOrigin(): bool
    {
        return !empty($this->serviceOfOrigin);
    }

    /**
     * @return bool
     */
    public function hasSlaAnnex(): bool
    {
        return !empty($this->slaAnnex);
    }

    /**
     * @return bool
     */
    public function hasSlaCommitment(): bool
    {
        return !empty($this->slaCommitment);
    }

    /**
     * @return bool
     */
    public function hasTitle(): bool
    {
        return !empty($this->title);
    }

    /**
     * @return null|bool
     */
    public function isDocumentToBeAdopted(): ?bool
    {
        return $this->documentToBeAdopted;
    }

    /**
     * @return null|bool
     */
    public function isSensitive(): ?bool
    {
        return $this->sensitive;
    }

    /**
     * @return null|bool
     */
    public function isSentViaRUE(): ?bool
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
     * @param \DateTimeInterface $requestedDeadline
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
