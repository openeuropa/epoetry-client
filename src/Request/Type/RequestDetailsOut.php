<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestDetailsOut
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
     * @var string
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return RequestDetailsOut
     */
    public function withTitle($title)
    {
        $new = clone $this;
        $new->title = $title;

        return $new;
    }

    /**
     * @return string
     */
    public function getWorkflowCode()
    {
        return $this->workflowCode;
    }

    /**
     * @param string $workflowCode
     * @return RequestDetailsOut
     */
    public function withWorkflowCode($workflowCode)
    {
        $new = clone $this;
        $new->workflowCode = $workflowCode;

        return $new;
    }

    /**
     * @return string
     */
    public function getInternalReference()
    {
        return $this->internalReference;
    }

    /**
     * @param string $internalReference
     * @return RequestDetailsOut
     */
    public function withInternalReference($internalReference)
    {
        $new = clone $this;
        $new->internalReference = $internalReference;

        return $new;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getRequestedDeadline()
    {
        return $this->requestedDeadline;
    }

    /**
     * @param \DateTimeInterface $requestedDeadline
     * @return RequestDetailsOut
     */
    public function withRequestedDeadline($requestedDeadline)
    {
        $new = clone $this;
        $new->requestedDeadline = $requestedDeadline;

        return $new;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getAcceptedDeadline()
    {
        return $this->acceptedDeadline;
    }

    /**
     * @param \DateTimeInterface $acceptedDeadline
     * @return RequestDetailsOut
     */
    public function withAcceptedDeadline($acceptedDeadline)
    {
        $new = clone $this;
        $new->acceptedDeadline = $acceptedDeadline;

        return $new;
    }

    /**
     * @return bool
     */
    public function getSensitive()
    {
        return $this->sensitive;
    }

    /**
     * @param bool $sensitive
     * @return RequestDetailsOut
     */
    public function withSensitive($sensitive)
    {
        $new = clone $this;
        $new->sensitive = $sensitive;

        return $new;
    }

    /**
     * @return bool
     */
    public function getSentViaRue()
    {
        return $this->sentViaRue;
    }

    /**
     * @param bool $sentViaRue
     * @return RequestDetailsOut
     */
    public function withSentViaRue($sentViaRue)
    {
        $new = clone $this;
        $new->sentViaRue = $sentViaRue;

        return $new;
    }

    /**
     * @return bool
     */
    public function getDocumentToAdopt()
    {
        return $this->documentToAdopt;
    }

    /**
     * @param bool $documentToAdopt
     * @return RequestDetailsOut
     */
    public function withDocumentToAdopt($documentToAdopt)
    {
        $new = clone $this;
        $new->documentToAdopt = $documentToAdopt;

        return $new;
    }

    /**
     * @return string
     */
    public function getDecideReference()
    {
        return $this->decideReference;
    }

    /**
     * @param string $decideReference
     * @return RequestDetailsOut
     */
    public function withDecideReference($decideReference)
    {
        $new = clone $this;
        $new->decideReference = $decideReference;

        return $new;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     * @return RequestDetailsOut
     */
    public function withDestination($destination)
    {
        $new = clone $this;
        $new->destination = $destination;

        return $new;
    }

    /**
     * @return string
     */
    public function getProcedure()
    {
        return $this->procedure;
    }

    /**
     * @param string $procedure
     * @return RequestDetailsOut
     */
    public function withProcedure($procedure)
    {
        $new = clone $this;
        $new->procedure = $procedure;

        return $new;
    }

    /**
     * @return string
     */
    public function getSlaAnnex()
    {
        return $this->slaAnnex;
    }

    /**
     * @param string $slaAnnex
     * @return RequestDetailsOut
     */
    public function withSlaAnnex($slaAnnex)
    {
        $new = clone $this;
        $new->slaAnnex = $slaAnnex;

        return $new;
    }

    /**
     * @return string
     */
    public function getSlaCommitment()
    {
        return $this->slaCommitment;
    }

    /**
     * @param string $slaCommitment
     * @return RequestDetailsOut
     */
    public function withSlaCommitment($slaCommitment)
    {
        $new = clone $this;
        $new->slaCommitment = $slaCommitment;

        return $new;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return RequestDetailsOut
     */
    public function withComment($comment)
    {
        $new = clone $this;
        $new->comment = $comment;

        return $new;
    }

    /**
     * @return string
     */
    public function getOnBehalfOf()
    {
        return $this->onBehalfOf;
    }

    /**
     * @param string $onBehalfOf
     * @return RequestDetailsOut
     */
    public function withOnBehalfOf($onBehalfOf)
    {
        $new = clone $this;
        $new->onBehalfOf = $onBehalfOf;

        return $new;
    }

    /**
     * @return string
     */
    public function getAccessibleTo()
    {
        return $this->accessibleTo;
    }

    /**
     * @param string $accessibleTo
     * @return RequestDetailsOut
     */
    public function withAccessibleTo($accessibleTo)
    {
        $new = clone $this;
        $new->accessibleTo = $accessibleTo;

        return $new;
    }

    /**
     * @return string
     */
    public function getKeyword1()
    {
        return $this->keyword1;
    }

    /**
     * @param string $keyword1
     * @return RequestDetailsOut
     */
    public function withKeyword1($keyword1)
    {
        $new = clone $this;
        $new->keyword1 = $keyword1;

        return $new;
    }

    /**
     * @return string
     */
    public function getKeyword2()
    {
        return $this->keyword2;
    }

    /**
     * @param string $keyword2
     * @return RequestDetailsOut
     */
    public function withKeyword2($keyword2)
    {
        $new = clone $this;
        $new->keyword2 = $keyword2;

        return $new;
    }

    /**
     * @return string
     */
    public function getKeyword3()
    {
        return $this->keyword3;
    }

    /**
     * @param string $keyword3
     * @return RequestDetailsOut
     */
    public function withKeyword3($keyword3)
    {
        $new = clone $this;
        $new->keyword3 = $keyword3;

        return $new;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return RequestDetailsOut
     */
    public function withStatus($status)
    {
        $new = clone $this;
        $new->status = $status;

        return $new;
    }

    /**
     * @return string
     */
    public function getRejectMessage()
    {
        return $this->rejectMessage;
    }

    /**
     * @param string $rejectMessage
     * @return RequestDetailsOut
     */
    public function withRejectMessage($rejectMessage)
    {
        $new = clone $this;
        $new->rejectMessage = $rejectMessage;

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
     * @return RequestDetailsOut
     */
    public function withApplicationName($applicationName)
    {
        $new = clone $this;
        $new->applicationName = $applicationName;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     * @return RequestDetailsOut
     */
    public function withContacts($contacts)
    {
        $new = clone $this;
        $new->contacts = $contacts;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
     */
    public function getOriginalDocument()
    {
        return $this->originalDocument;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut $originalDocument
     * @return RequestDetailsOut
     */
    public function withOriginalDocument($originalDocument)
    {
        $new = clone $this;
        $new->originalDocument = $originalDocument;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Products
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Products $products
     * @return RequestDetailsOut
     */
    public function withProducts($products)
    {
        $new = clone $this;
        $new->products = $products;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
     */
    public function getAuxiliaryDocuments()
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments $auxiliaryDocuments
     * @return RequestDetailsOut
     */
    public function withAuxiliaryDocuments($auxiliaryDocuments)
    {
        $new = clone $this;
        $new->auxiliaryDocuments = $auxiliaryDocuments;

        return $new;
    }
}

