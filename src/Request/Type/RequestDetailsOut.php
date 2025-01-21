<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestDetailsOut
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\WorkflowCode
     */
    private $workflowCode;

    /**
     * @var string
     */
    private $internalReference;

    /**
     * @var \DateTimeInterface
     */
    private $requestedDeadline;

    /**
     * @var \DateTimeInterface
     */
    private $acceptedDeadline;

    /**
     * @var bool
     */
    private $sensitive;

    /**
     * @var bool
     */
    private $sentViaRue;

    /**
     * @var bool
     */
    private $documentToAdopt;

    /**
     * @var string
     */
    private $decideReference;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Destination
     */
    private $destination;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Procedure
     */
    private $procedure;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\SlaAnnex
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
     * @var \OpenEuropa\EPoetry\Request\Type\AccessLevel
     */
    private $accessibleTo;

    /**
     * @var string
     */
    private $keyword1;

    /**
     * @var string
     */
    private $keyword2;

    /**
     * @var string
     */
    private $keyword3;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\RequestStatus
     */
    private $status;

    /**
     * @var string
     */
    private $rejectMessage;

    /**
     * @var string
     */
    private $applicationName;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    private $contacts;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
     */
    private $originalDocument;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Products
     */
    private $products;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
     */
    private $auxiliaryDocuments;

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title) : static
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
     * @param \OpenEuropa\EPoetry\Request\Type\WorkflowCode $workflowCode
     * @return $this
     */
    public function setWorkflowCode(\OpenEuropa\EPoetry\Request\Type\WorkflowCode $workflowCode) : static
    {
        $this->workflowCode = $workflowCode;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\WorkflowCode|null
     */
    public function getWorkflowCode() : ?\OpenEuropa\EPoetry\Request\Type\WorkflowCode
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
    public function setInternalReference(string $internalReference) : static
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
    public function setRequestedDeadline(\DateTimeInterface $requestedDeadline) : static
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
    public function setAcceptedDeadline(\DateTimeInterface $acceptedDeadline) : static
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
    public function setSensitive(bool $sensitive) : static
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
    public function setSentViaRue(bool $sentViaRue) : static
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
    public function setDocumentToAdopt(bool $documentToAdopt) : static
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
    public function setDecideReference(string $decideReference) : static
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
     * @param \OpenEuropa\EPoetry\Request\Type\Destination $destination
     * @return $this
     */
    public function setDestination(\OpenEuropa\EPoetry\Request\Type\Destination $destination) : static
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Destination|null
     */
    public function getDestination() : ?\OpenEuropa\EPoetry\Request\Type\Destination
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
     * @param \OpenEuropa\EPoetry\Request\Type\Procedure $procedure
     * @return $this
     */
    public function setProcedure(\OpenEuropa\EPoetry\Request\Type\Procedure $procedure) : static
    {
        $this->procedure = $procedure;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Procedure|null
     */
    public function getProcedure() : ?\OpenEuropa\EPoetry\Request\Type\Procedure
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
     * @param \OpenEuropa\EPoetry\Request\Type\SlaAnnex $slaAnnex
     * @return $this
     */
    public function setSlaAnnex(\OpenEuropa\EPoetry\Request\Type\SlaAnnex $slaAnnex) : static
    {
        $this->slaAnnex = $slaAnnex;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\SlaAnnex|null
     */
    public function getSlaAnnex() : ?\OpenEuropa\EPoetry\Request\Type\SlaAnnex
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
    public function setSlaCommitment(string $slaCommitment) : static
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
    public function setComment(string $comment) : static
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
    public function setOnBehalfOf(string $onBehalfOf) : static
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
     * @param \OpenEuropa\EPoetry\Request\Type\AccessLevel $accessibleTo
     * @return $this
     */
    public function setAccessibleTo(\OpenEuropa\EPoetry\Request\Type\AccessLevel $accessibleTo) : static
    {
        $this->accessibleTo = $accessibleTo;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\AccessLevel|null
     */
    public function getAccessibleTo() : ?\OpenEuropa\EPoetry\Request\Type\AccessLevel
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
    public function setKeyword1(string $keyword1) : static
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
    public function setKeyword2(string $keyword2) : static
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
    public function setKeyword3(string $keyword3) : static
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
     * @param \OpenEuropa\EPoetry\Request\Type\RequestStatus $status
     * @return $this
     */
    public function setStatus(\OpenEuropa\EPoetry\Request\Type\RequestStatus $status) : static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestStatus|null
     */
    public function getStatus() : ?\OpenEuropa\EPoetry\Request\Type\RequestStatus
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
    public function setRejectMessage(string $rejectMessage) : static
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
    public function setApplicationName(string $applicationName) : static
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
    public function setContacts(\OpenEuropa\EPoetry\Request\Type\Contacts $contacts) : static
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
    public function setOriginalDocument(\OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut $originalDocument) : static
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
    public function setProducts(\OpenEuropa\EPoetry\Request\Type\Products $products) : static
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
    public function setAuxiliaryDocuments(\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments $auxiliaryDocuments) : static
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

