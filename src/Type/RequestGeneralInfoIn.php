<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class RequestGeneralInfoIn
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
     * @var null|\DateTime
     */
    protected $requestedDeadline;

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
     * @return null|\DateTime
     */
    public function getRequestedDeadline(): ?\DateTime
    {
        return $this->requestedDeadline;
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
        if (\is_array($this->accessibleTo)) {
            return !empty($this->accessibleTo);
        }

        return isset($this->accessibleTo);
    }

    /**
     * @return bool
     */
    public function hasComment(): bool
    {
        if (\is_array($this->comment)) {
            return !empty($this->comment);
        }

        return isset($this->comment);
    }

    /**
     * @return bool
     */
    public function hasDecideReference(): bool
    {
        if (\is_array($this->decideReference)) {
            return !empty($this->decideReference);
        }

        return isset($this->decideReference);
    }

    /**
     * @return bool
     */
    public function hasDestinationCode(): bool
    {
        if (\is_array($this->destinationCode)) {
            return !empty($this->destinationCode);
        }

        return isset($this->destinationCode);
    }

    /**
     * @return bool
     */
    public function hasDocumentToBeAdopted(): bool
    {
        if (\is_array($this->documentToBeAdopted)) {
            return !empty($this->documentToBeAdopted);
        }

        return isset($this->documentToBeAdopted);
    }

    /**
     * @return bool
     */
    public function hasInternalReference(): bool
    {
        if (\is_array($this->internalReference)) {
            return !empty($this->internalReference);
        }

        return isset($this->internalReference);
    }

    /**
     * @return bool
     */
    public function hasInternalTechnicalId(): bool
    {
        if (\is_array($this->internalTechnicalId)) {
            return !empty($this->internalTechnicalId);
        }

        return isset($this->internalTechnicalId);
    }

    /**
     * @return bool
     */
    public function hasOnBehalfOf(): bool
    {
        if (\is_array($this->onBehalfOf)) {
            return !empty($this->onBehalfOf);
        }

        return isset($this->onBehalfOf);
    }

    /**
     * @return bool
     */
    public function hasRequestedDeadline(): bool
    {
        if (\is_array($this->requestedDeadline)) {
            return !empty($this->requestedDeadline);
        }

        return isset($this->requestedDeadline);
    }

    /**
     * @return bool
     */
    public function hasSensitive(): bool
    {
        if (\is_array($this->sensitive)) {
            return !empty($this->sensitive);
        }

        return isset($this->sensitive);
    }

    /**
     * @return bool
     */
    public function hasSentViaRUE(): bool
    {
        if (\is_array($this->sentViaRUE)) {
            return !empty($this->sentViaRUE);
        }

        return isset($this->sentViaRUE);
    }

    /**
     * @return bool
     */
    public function hasSlaAnnex(): bool
    {
        if (\is_array($this->slaAnnex)) {
            return !empty($this->slaAnnex);
        }

        return isset($this->slaAnnex);
    }

    /**
     * @return bool
     */
    public function hasSlaCommitment(): bool
    {
        if (\is_array($this->slaCommitment)) {
            return !empty($this->slaCommitment);
        }

        return isset($this->slaCommitment);
    }

    /**
     * @return bool
     */
    public function hasTitle(): bool
    {
        if (\is_array($this->title)) {
            return !empty($this->title);
        }

        return isset($this->title);
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
    public function setAccessibleTo(string $accessibleTo): RequestGeneralInfoIn
    {
        $this->accessibleTo = $accessibleTo;

        return $this;
    }

    /**
     * @param string $comment
     *
     * @return $this
     */
    public function setComment(string $comment): RequestGeneralInfoIn
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * @param string $decideReference
     *
     * @return $this
     */
    public function setDecideReference(string $decideReference): RequestGeneralInfoIn
    {
        $this->decideReference = $decideReference;

        return $this;
    }

    /**
     * @param string $destinationCode
     *
     * @return $this
     */
    public function setDestinationCode(string $destinationCode): RequestGeneralInfoIn
    {
        $this->destinationCode = $destinationCode;

        return $this;
    }

    /**
     * @param bool $documentToBeAdopted
     *
     * @return $this
     */
    public function setDocumentToBeAdopted(bool $documentToBeAdopted): RequestGeneralInfoIn
    {
        $this->documentToBeAdopted = $documentToBeAdopted;

        return $this;
    }

    /**
     * @param string $internalReference
     *
     * @return $this
     */
    public function setInternalReference(string $internalReference): RequestGeneralInfoIn
    {
        $this->internalReference = $internalReference;

        return $this;
    }

    /**
     * @param string $internalTechnicalId
     *
     * @return $this
     */
    public function setInternalTechnicalId(string $internalTechnicalId): RequestGeneralInfoIn
    {
        $this->internalTechnicalId = $internalTechnicalId;

        return $this;
    }

    /**
     * @param string $onBehalfOf
     *
     * @return $this
     */
    public function setOnBehalfOf(string $onBehalfOf): RequestGeneralInfoIn
    {
        $this->onBehalfOf = $onBehalfOf;

        return $this;
    }

    /**
     * @param \DateTime $requestedDeadline
     *
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline): RequestGeneralInfoIn
    {
        $this->requestedDeadline = $requestedDeadline;

        return $this;
    }

    /**
     * @param bool $sensitive
     *
     * @return $this
     */
    public function setSensitive(bool $sensitive): RequestGeneralInfoIn
    {
        $this->sensitive = $sensitive;

        return $this;
    }

    /**
     * @param bool $sentViaRUE
     *
     * @return $this
     */
    public function setSentViaRUE(bool $sentViaRUE): RequestGeneralInfoIn
    {
        $this->sentViaRUE = $sentViaRUE;

        return $this;
    }

    /**
     * @param string $slaAnnex
     *
     * @return $this
     */
    public function setSlaAnnex(string $slaAnnex): RequestGeneralInfoIn
    {
        $this->slaAnnex = $slaAnnex;

        return $this;
    }

    /**
     * @param string $slaCommitment
     *
     * @return $this
     */
    public function setSlaCommitment(string $slaCommitment): RequestGeneralInfoIn
    {
        $this->slaCommitment = $slaCommitment;

        return $this;
    }

    /**
     * @param string $title
     *
     * @return $this
     */
    public function setTitle(string $title): RequestGeneralInfoIn
    {
        $this->title = $title;

        return $this;
    }
}
