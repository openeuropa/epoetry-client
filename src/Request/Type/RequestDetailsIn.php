<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestDetailsIn
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var null | 'WEB' | 'HOTL' | 'STS' | 'PP' | 'QE'
     */
    private $workflowCode = null;

    /**
     * @var null | string
     */
    private $internalReference = null;

    /**
     * @var null | \DateTimeInterface
     */
    private $requestedDeadline = null;

    /**
     * @var null | bool
     */
    private $sensitive = null;

    /**
     * @var null | bool
     */
    private $sentViaRue = null;

    /**
     * @var null | bool
     */
    private $documentToAdopt = null;

    /**
     * @var null | string
     */
    private $decideReference = null;

    /**
     * @var null | 'EM' | 'EXT' | 'IE' | 'INTERNE' | 'JO' | 'PUBLIC'
     */
    private $destination = null;

    /**
     * @var null | 'DEGHP' | 'NEANT' | 'PROAC' | 'PROCD' | 'PROCE' | 'PROCH' | 'PROCO' | 'REUNAU' | 'REUNCS'
     */
    private $procedure = null;

    /**
     * @var null | 'ANNEX8A' | 'ANNEX8B' | 'NO'
     */
    private $slaAnnex = null;

    /**
     * @var null | string
     */
    private $slaCommitment = null;

    /**
     * @var null | string
     */
    private $comment = null;

    /**
     * @var null | string
     */
    private $onBehalfOf = null;

    /**
     * @var null | 'CONTACTS' | 'UNIT' | 'DIR' | 'DG' | 'ON_BEHALF_DG'
     */
    private $accessibleTo = null;

    /**
     * @var null | string
     */
    private $keyword1 = null;

    /**
     * @var null | string
     */
    private $keyword2 = null;

    /**
     * @var null | string
     */
    private $keyword3 = null;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    private $contacts;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
     */
    private $originalDocument;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Products
     */
    private $products;

    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
     */
    private $auxiliaryDocuments = null;

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): static
    {
        $this->title = $title;
        return $this;
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
    public function hasTitle(): bool
    {
        return !empty($this->title);
    }

    /**
     * @param null | 'WEB' | 'HOTL' | 'STS' | 'PP' | 'QE' $workflowCode
     * @return $this
     */
    public function setWorkflowCode(?string $workflowCode): static
    {
        $this->workflowCode = $workflowCode;
        return $this;
    }

    /**
     * @return null | 'WEB' | 'HOTL' | 'STS' | 'PP' | 'QE'
     */
    public function getWorkflowCode(): ?string
    {
        return $this->workflowCode;
    }

    /**
     * @return bool
     */
    public function hasWorkflowCode(): bool
    {
        return !empty($this->workflowCode);
    }

    /**
     * @param null | string $internalReference
     * @return $this
     */
    public function setInternalReference(?string $internalReference): static
    {
        $this->internalReference = $internalReference;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getInternalReference(): ?string
    {
        return $this->internalReference;
    }

    /**
     * @return bool
     */
    public function hasInternalReference(): bool
    {
        return !empty($this->internalReference);
    }

    /**
     * @param null | \DateTimeInterface $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline(?\DateTimeInterface $requestedDeadline): static
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return null | \DateTimeInterface
     */
    public function getRequestedDeadline(): ?\DateTimeInterface
    {
        return $this->requestedDeadline;
    }

    /**
     * @return bool
     */
    public function hasRequestedDeadline(): bool
    {
        return !empty($this->requestedDeadline);
    }

    /**
     * @param null | bool $sensitive
     * @return $this
     */
    public function setSensitive(?bool $sensitive): static
    {
        $this->sensitive = $sensitive;
        return $this;
    }

    /**
     * @return null | bool
     */
    public function isSensitive(): ?bool
    {
        return $this->sensitive;
    }

    /**
     * @return bool
     */
    public function hasSensitive(): bool
    {
        return !empty($this->sensitive);
    }

    /**
     * @param null | bool $sentViaRue
     * @return $this
     */
    public function setSentViaRue(?bool $sentViaRue): static
    {
        $this->sentViaRue = $sentViaRue;
        return $this;
    }

    /**
     * @return null | bool
     */
    public function isSentViaRue(): ?bool
    {
        return $this->sentViaRue;
    }

    /**
     * @return bool
     */
    public function hasSentViaRue(): bool
    {
        return !empty($this->sentViaRue);
    }

    /**
     * @param null | bool $documentToAdopt
     * @return $this
     */
    public function setDocumentToAdopt(?bool $documentToAdopt): static
    {
        $this->documentToAdopt = $documentToAdopt;
        return $this;
    }

    /**
     * @return null | bool
     */
    public function isDocumentToAdopt(): ?bool
    {
        return $this->documentToAdopt;
    }

    /**
     * @return bool
     */
    public function hasDocumentToAdopt(): bool
    {
        return !empty($this->documentToAdopt);
    }

    /**
     * @param null | string $decideReference
     * @return $this
     */
    public function setDecideReference(?string $decideReference): static
    {
        $this->decideReference = $decideReference;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getDecideReference(): ?string
    {
        return $this->decideReference;
    }

    /**
     * @return bool
     */
    public function hasDecideReference(): bool
    {
        return !empty($this->decideReference);
    }

    /**
     * @param null | 'EM' | 'EXT' | 'IE' | 'INTERNE' | 'JO' | 'PUBLIC' $destination
     * @return $this
     */
    public function setDestination(?string $destination): static
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return null | 'EM' | 'EXT' | 'IE' | 'INTERNE' | 'JO' | 'PUBLIC'
     */
    public function getDestination(): ?string
    {
        return $this->destination;
    }

    /**
     * @return bool
     */
    public function hasDestination(): bool
    {
        return !empty($this->destination);
    }

    /**
     * @param null | 'DEGHP' | 'NEANT' | 'PROAC' | 'PROCD' | 'PROCE' | 'PROCH' | 'PROCO' | 'REUNAU' | 'REUNCS' $procedure
     * @return $this
     */
    public function setProcedure(?string $procedure): static
    {
        $this->procedure = $procedure;
        return $this;
    }

    /**
     * @return null | 'DEGHP' | 'NEANT' | 'PROAC' | 'PROCD' | 'PROCE' | 'PROCH' | 'PROCO' | 'REUNAU' | 'REUNCS'
     */
    public function getProcedure(): ?string
    {
        return $this->procedure;
    }

    /**
     * @return bool
     */
    public function hasProcedure(): bool
    {
        return !empty($this->procedure);
    }

    /**
     * @param null | 'ANNEX8A' | 'ANNEX8B' | 'NO' $slaAnnex
     * @return $this
     */
    public function setSlaAnnex(?string $slaAnnex): static
    {
        $this->slaAnnex = $slaAnnex;
        return $this;
    }

    /**
     * @return null | 'ANNEX8A' | 'ANNEX8B' | 'NO'
     */
    public function getSlaAnnex(): ?string
    {
        return $this->slaAnnex;
    }

    /**
     * @return bool
     */
    public function hasSlaAnnex(): bool
    {
        return !empty($this->slaAnnex);
    }

    /**
     * @param null | string $slaCommitment
     * @return $this
     */
    public function setSlaCommitment(?string $slaCommitment): static
    {
        $this->slaCommitment = $slaCommitment;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getSlaCommitment(): ?string
    {
        return $this->slaCommitment;
    }

    /**
     * @return bool
     */
    public function hasSlaCommitment(): bool
    {
        return !empty($this->slaCommitment);
    }

    /**
     * @param null | string $comment
     * @return $this
     */
    public function setComment(?string $comment): static
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return bool
     */
    public function hasComment(): bool
    {
        return !empty($this->comment);
    }

    /**
     * @param null | string $onBehalfOf
     * @return $this
     */
    public function setOnBehalfOf(?string $onBehalfOf): static
    {
        $this->onBehalfOf = $onBehalfOf;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getOnBehalfOf(): ?string
    {
        return $this->onBehalfOf;
    }

    /**
     * @return bool
     */
    public function hasOnBehalfOf(): bool
    {
        return !empty($this->onBehalfOf);
    }

    /**
     * @param null | 'CONTACTS' | 'UNIT' | 'DIR' | 'DG' | 'ON_BEHALF_DG' $accessibleTo
     * @return $this
     */
    public function setAccessibleTo(?string $accessibleTo): static
    {
        $this->accessibleTo = $accessibleTo;
        return $this;
    }

    /**
     * @return null | 'CONTACTS' | 'UNIT' | 'DIR' | 'DG' | 'ON_BEHALF_DG'
     */
    public function getAccessibleTo(): ?string
    {
        return $this->accessibleTo;
    }

    /**
     * @return bool
     */
    public function hasAccessibleTo(): bool
    {
        return !empty($this->accessibleTo);
    }

    /**
     * @param null | string $keyword1
     * @return $this
     */
    public function setKeyword1(?string $keyword1): static
    {
        $this->keyword1 = $keyword1;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getKeyword1(): ?string
    {
        return $this->keyword1;
    }

    /**
     * @return bool
     */
    public function hasKeyword1(): bool
    {
        return !empty($this->keyword1);
    }

    /**
     * @param null | string $keyword2
     * @return $this
     */
    public function setKeyword2(?string $keyword2): static
    {
        $this->keyword2 = $keyword2;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getKeyword2(): ?string
    {
        return $this->keyword2;
    }

    /**
     * @return bool
     */
    public function hasKeyword2(): bool
    {
        return !empty($this->keyword2);
    }

    /**
     * @param null | string $keyword3
     * @return $this
     */
    public function setKeyword3(?string $keyword3): static
    {
        $this->keyword3 = $keyword3;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getKeyword3(): ?string
    {
        return $this->keyword3;
    }

    /**
     * @return bool
     */
    public function hasKeyword3(): bool
    {
        return !empty($this->keyword3);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     * @return $this
     */
    public function setContacts(\OpenEuropa\EPoetry\Request\Type\Contacts $contacts): static
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    public function getContacts(): \OpenEuropa\EPoetry\Request\Type\Contacts
    {
        return $this->contacts;
    }

    /**
     * @return bool
     */
    public function hasContacts(): bool
    {
        return !empty($this->contacts);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn $originalDocument
     * @return $this
     */
    public function setOriginalDocument(\OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn $originalDocument): static
    {
        $this->originalDocument = $originalDocument;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
     */
    public function getOriginalDocument(): \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
    {
        return $this->originalDocument;
    }

    /**
     * @return bool
     */
    public function hasOriginalDocument(): bool
    {
        return !empty($this->originalDocument);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Products $products
     * @return $this
     */
    public function setProducts(\OpenEuropa\EPoetry\Request\Type\Products $products): static
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Products
     */
    public function getProducts(): \OpenEuropa\EPoetry\Request\Type\Products
    {
        return $this->products;
    }

    /**
     * @return bool
     */
    public function hasProducts(): bool
    {
        return !empty($this->products);
    }

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn $auxiliaryDocuments
     * @return $this
     */
    public function setAuxiliaryDocuments(?\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn $auxiliaryDocuments): static
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
     */
    public function getAuxiliaryDocuments(): ?\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @return bool
     */
    public function hasAuxiliaryDocuments(): bool
    {
        return !empty($this->auxiliaryDocuments);
    }
}

