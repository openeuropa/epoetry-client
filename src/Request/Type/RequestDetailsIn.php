<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestDetailsIn
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
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
     * @var string
     */
    private $destination;

    /**
     * @var string
     */
    private $procedure;

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
     * @var \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
     */
    private $auxiliaryDocuments;

    /**
     * Constructor
     *
     * @var string $title
     * @var string $workflowCode
     * @var string $internalReference
     * @var \DateTimeInterface $requestedDeadline
     * @var bool $sensitive
     * @var bool $sentViaRue
     * @var bool $documentToAdopt
     * @var string $decideReference
     * @var string $destination
     * @var string $procedure
     * @var string $slaAnnex
     * @var string $slaCommitment
     * @var string $comment
     * @var string $onBehalfOf
     * @var string $accessibleTo
     * @var string $keyword1
     * @var string $keyword2
     * @var string $keyword3
     * @var \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     * @var \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn $originalDocument
     * @var \OpenEuropa\EPoetry\Request\Type\Products $products
     * @var \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn $auxiliaryDocuments
     */
    public function __construct(string $title, string $workflowCode, string $internalReference, \DateTimeInterface $requestedDeadline, bool $sensitive, bool $sentViaRue, bool $documentToAdopt, string $decideReference, string $destination, string $procedure, string $slaAnnex, string $slaCommitment, string $comment, string $onBehalfOf, string $accessibleTo, string $keyword1, string $keyword2, string $keyword3, \OpenEuropa\EPoetry\Request\Type\Contacts $contacts, \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn $originalDocument, \OpenEuropa\EPoetry\Request\Type\Products $products, \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn $auxiliaryDocuments)
    {
        $this->title = $title;
        $this->workflowCode = $workflowCode;
        $this->internalReference = $internalReference;
        $this->requestedDeadline = $requestedDeadline;
        $this->sensitive = $sensitive;
        $this->sentViaRue = $sentViaRue;
        $this->documentToAdopt = $documentToAdopt;
        $this->decideReference = $decideReference;
        $this->destination = $destination;
        $this->procedure = $procedure;
        $this->slaAnnex = $slaAnnex;
        $this->slaCommitment = $slaCommitment;
        $this->comment = $comment;
        $this->onBehalfOf = $onBehalfOf;
        $this->accessibleTo = $accessibleTo;
        $this->keyword1 = $keyword1;
        $this->keyword2 = $keyword2;
        $this->keyword3 = $keyword3;
        $this->contacts = $contacts;
        $this->originalDocument = $originalDocument;
        $this->products = $products;
        $this->auxiliaryDocuments = $auxiliaryDocuments;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle() : string
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
    public function setWorkflowCode(string $workflowCode) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->workflowCode = $workflowCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getWorkflowCode() : string
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
    public function setInternalReference(string $internalReference) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->internalReference = $internalReference;
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
    public function setRequestedDeadline($requestedDeadline) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getRequestedDeadline() : \DateTimeInterface
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
     * @param bool $sensitive
     * @return $this
     */
    public function setSensitive(bool $sensitive) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->sensitive = $sensitive;
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
    public function setSentViaRue(bool $sentViaRue) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->sentViaRue = $sentViaRue;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSentViaRue() : bool
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
    public function setDocumentToAdopt(bool $documentToAdopt) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->documentToAdopt = $documentToAdopt;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDocumentToAdopt() : bool
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
    public function setDecideReference(string $decideReference) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->decideReference = $decideReference;
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
    public function setDestination(string $destination) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestination() : string
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
    public function setProcedure(string $procedure) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->procedure = $procedure;
        return $this;
    }

    /**
     * @return string
     */
    public function getProcedure() : string
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
    public function setSlaAnnex(string $slaAnnex) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->slaAnnex = $slaAnnex;
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
    public function setSlaCommitment(string $slaCommitment) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->slaCommitment = $slaCommitment;
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
    public function setComment(string $comment) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->comment = $comment;
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
    public function setOnBehalfOf(string $onBehalfOf) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->onBehalfOf = $onBehalfOf;
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
    public function setAccessibleTo(string $accessibleTo) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->accessibleTo = $accessibleTo;
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
    public function setKeyword1(string $keyword1) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->keyword1 = $keyword1;
        return $this;
    }

    /**
     * @return string
     */
    public function getKeyword1() : string
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
    public function setKeyword2(string $keyword2) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->keyword2 = $keyword2;
        return $this;
    }

    /**
     * @return string
     */
    public function getKeyword2() : string
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
    public function setKeyword3(string $keyword3) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->keyword3 = $keyword3;
        return $this;
    }

    /**
     * @return string
     */
    public function getKeyword3() : string
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
     * @param \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     * @return $this
     */
    public function setContacts($contacts) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    public function getContacts() : \OpenEuropa\EPoetry\Request\Type\Contacts
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
     * @param \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn $originalDocument
     * @return $this
     */
    public function setOriginalDocument($originalDocument) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->originalDocument = $originalDocument;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
     */
    public function getOriginalDocument() : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
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
    public function setProducts($products) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Products
     */
    public function getProducts() : \OpenEuropa\EPoetry\Request\Type\Products
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
     * @param \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn $auxiliaryDocuments
     * @return $this
     */
    public function setAuxiliaryDocuments($auxiliaryDocuments) : \OpenEuropa\EPoetry\Request\Type\RequestDetailsIn
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
     */
    public function getAuxiliaryDocuments() : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
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

