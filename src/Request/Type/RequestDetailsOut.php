<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestDetailsOut
{
    /**
     * @var null|string
     */
    private $title;

    /**
     * @var null|string
     */
    private $workflowCode;

    /**
     * @var null|string
     */
    private $internalReference;

    /**
     * @var null|\DateTimeInterface
     */
    private $requestedDeadline;

    /**
     * @var null|\DateTimeInterface
     */
    private $acceptedDeadline;

    /**
     * @var null|bool
     */
    private $sensitive;

    /**
     * @var null|bool
     */
    private $sentViaRue;

    /**
     * @var null|bool
     */
    private $documentToAdopt;

    /**
     * @var null|string
     */
    private $decideReference;

    /**
     * @var null|string
     */
    private $destination;

    /**
     * @var null|string
     */
    private $procedure;

    /**
     * @var null|string
     */
    private $slaAnnex;

    /**
     * @var null|string
     */
    private $slaCommitment;

    /**
     * @var null|string
     */
    private $comment;

    /**
     * @var null|string
     */
    private $onBehalfOf;

    /**
     * @var null|string
     */
    private $accessibleTo;

    /**
     * @var null|string
     */
    private $keyword1;

    /**
     * @var null|string
     */
    private $keyword2;

    /**
     * @var null|string
     */
    private $keyword3;

    /**
     * @var null|string
     */
    private $status;

    /**
     * @var null|string
     */
    private $rejectMessage;

    /**
     * @var null|string
     */
    private $applicationName;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\Contacts
     */
    private $contacts;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
     */
    private $originalDocument;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\Products
     */
    private $products;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
     */
    private $auxiliaryDocuments;

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle() : ?string
    {
        return $this->title;
    }

    /**
     * @return bool
     */
    public function hasTitle() : bool
    {
        return !empty($this->title);
    }

    /**
     * @param string $workflowCode
     * @return $this
     */
    public function setWorkflowCode(string $workflowCode) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->workflowCode = $workflowCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getWorkflowCode() : ?string
    {
        return $this->workflowCode;
    }

    /**
     * @return bool
     */
    public function hasWorkflowCode() : bool
    {
        return !empty($this->workflowCode);
    }

    /**
     * @param string $internalReference
     * @return $this
     */
    public function setInternalReference(string $internalReference) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->internalReference = $internalReference;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInternalReference() : ?string
    {
        return $this->internalReference;
    }

    /**
     * @return bool
     */
    public function hasInternalReference() : bool
    {
        return !empty($this->internalReference);
    }

    /**
     * @param \DateTimeInterface $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getRequestedDeadline() : ?\DateTimeInterface
    {
        return $this->requestedDeadline;
    }

    /**
     * @return bool
     */
    public function hasRequestedDeadline() : bool
    {
        return !empty($this->requestedDeadline);
    }

    /**
     * @param \DateTimeInterface $acceptedDeadline
     * @return $this
     */
    public function setAcceptedDeadline($acceptedDeadline) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->acceptedDeadline = $acceptedDeadline;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getAcceptedDeadline() : ?\DateTimeInterface
    {
        return $this->acceptedDeadline;
    }

    /**
     * @return bool
     */
    public function hasAcceptedDeadline() : bool
    {
        return !empty($this->acceptedDeadline);
    }

    /**
     * @param bool $sensitive
     * @return $this
     */
    public function setSensitive(bool $sensitive) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->sensitive = $sensitive;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSensitive() : ?bool
    {
        return $this->sensitive;
    }

    /**
     * @return bool
     */
    public function hasSensitive() : bool
    {
        return !empty($this->sensitive);
    }

    /**
     * @param bool $sentViaRue
     * @return $this
     */
    public function setSentViaRue(bool $sentViaRue) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->sentViaRue = $sentViaRue;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSentViaRue() : ?bool
    {
        return $this->sentViaRue;
    }

    /**
     * @return bool
     */
    public function hasSentViaRue() : bool
    {
        return !empty($this->sentViaRue);
    }

    /**
     * @param bool $documentToAdopt
     * @return $this
     */
    public function setDocumentToAdopt(bool $documentToAdopt) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->documentToAdopt = $documentToAdopt;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isDocumentToAdopt() : ?bool
    {
        return $this->documentToAdopt;
    }

    /**
     * @return bool
     */
    public function hasDocumentToAdopt() : bool
    {
        return !empty($this->documentToAdopt);
    }

    /**
     * @param string $decideReference
     * @return $this
     */
    public function setDecideReference(string $decideReference) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->decideReference = $decideReference;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDecideReference() : ?string
    {
        return $this->decideReference;
    }

    /**
     * @return bool
     */
    public function hasDecideReference() : bool
    {
        return !empty($this->decideReference);
    }

    /**
     * @param string $destination
     * @return $this
     */
    public function setDestination(string $destination) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDestination() : ?string
    {
        return $this->destination;
    }

    /**
     * @return bool
     */
    public function hasDestination() : bool
    {
        return !empty($this->destination);
    }

    /**
     * @param string $procedure
     * @return $this
     */
    public function setProcedure(string $procedure) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->procedure = $procedure;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProcedure() : ?string
    {
        return $this->procedure;
    }

    /**
     * @return bool
     */
    public function hasProcedure() : bool
    {
        return !empty($this->procedure);
    }

    /**
     * @param string $slaAnnex
     * @return $this
     */
    public function setSlaAnnex(string $slaAnnex) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->slaAnnex = $slaAnnex;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlaAnnex() : ?string
    {
        return $this->slaAnnex;
    }

    /**
     * @return bool
     */
    public function hasSlaAnnex() : bool
    {
        return !empty($this->slaAnnex);
    }

    /**
     * @param string $slaCommitment
     * @return $this
     */
    public function setSlaCommitment(string $slaCommitment) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->slaCommitment = $slaCommitment;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSlaCommitment() : ?string
    {
        return $this->slaCommitment;
    }

    /**
     * @return bool
     */
    public function hasSlaCommitment() : bool
    {
        return !empty($this->slaCommitment);
    }

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment(string $comment) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment() : ?string
    {
        return $this->comment;
    }

    /**
     * @return bool
     */
    public function hasComment() : bool
    {
        return !empty($this->comment);
    }

    /**
     * @param string $onBehalfOf
     * @return $this
     */
    public function setOnBehalfOf(string $onBehalfOf) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->onBehalfOf = $onBehalfOf;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOnBehalfOf() : ?string
    {
        return $this->onBehalfOf;
    }

    /**
     * @return bool
     */
    public function hasOnBehalfOf() : bool
    {
        return !empty($this->onBehalfOf);
    }

    /**
     * @param string $accessibleTo
     * @return $this
     */
    public function setAccessibleTo(string $accessibleTo) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->accessibleTo = $accessibleTo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccessibleTo() : ?string
    {
        return $this->accessibleTo;
    }

    /**
     * @return bool
     */
    public function hasAccessibleTo() : bool
    {
        return !empty($this->accessibleTo);
    }

    /**
     * @param string $keyword1
     * @return $this
     */
    public function setKeyword1(string $keyword1) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->keyword1 = $keyword1;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getKeyword1() : ?string
    {
        return $this->keyword1;
    }

    /**
     * @return bool
     */
    public function hasKeyword1() : bool
    {
        return !empty($this->keyword1);
    }

    /**
     * @param string $keyword2
     * @return $this
     */
    public function setKeyword2(string $keyword2) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->keyword2 = $keyword2;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getKeyword2() : ?string
    {
        return $this->keyword2;
    }

    /**
     * @return bool
     */
    public function hasKeyword2() : bool
    {
        return !empty($this->keyword2);
    }

    /**
     * @param string $keyword3
     * @return $this
     */
    public function setKeyword3(string $keyword3) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->keyword3 = $keyword3;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getKeyword3() : ?string
    {
        return $this->keyword3;
    }

    /**
     * @return bool
     */
    public function hasKeyword3() : bool
    {
        return !empty($this->keyword3);
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus() : ?string
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function hasStatus() : bool
    {
        return !empty($this->status);
    }

    /**
     * @param string $rejectMessage
     * @return $this
     */
    public function setRejectMessage(string $rejectMessage) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->rejectMessage = $rejectMessage;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRejectMessage() : ?string
    {
        return $this->rejectMessage;
    }

    /**
     * @return bool
     */
    public function hasRejectMessage() : bool
    {
        return !empty($this->rejectMessage);
    }

    /**
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
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
     * @param \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     * @return $this
     */
    public function setContacts($contacts) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Contacts|null
     */
    public function getContacts() : ?\OpenEuropa\EPoetry\Request\Type\Contacts
    {
        return $this->contacts;
    }

    /**
     * @return bool
     */
    public function hasContacts() : bool
    {
        return !empty($this->contacts);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut $originalDocument
     * @return $this
     */
    public function setOriginalDocument($originalDocument) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->originalDocument = $originalDocument;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut|null
     */
    public function getOriginalDocument() : ?\OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
    {
        return $this->originalDocument;
    }

    /**
     * @return bool
     */
    public function hasOriginalDocument() : bool
    {
        return !empty($this->originalDocument);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Products $products
     * @return $this
     */
    public function setProducts($products) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Products|null
     */
    public function getProducts() : ?\OpenEuropa\EPoetry\Request\Type\Products
    {
        return $this->products;
    }

    /**
     * @return bool
     */
    public function hasProducts() : bool
    {
        return !empty($this->products);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments $auxiliaryDocuments
     * @return $this
     */
    public function setAuxiliaryDocuments($auxiliaryDocuments) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsOut
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments|null
     */
    public function getAuxiliaryDocuments() : ?\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @return bool
     */
    public function hasAuxiliaryDocuments() : bool
    {
        return !empty($this->auxiliaryDocuments);
    }
}

