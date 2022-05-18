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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
     */
    public function withRequestedDeadline($requestedDeadline)
    {
        $new = clone $this;
        $new->requestedDeadline = $requestedDeadline;

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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
     */
    public function withKeyword3($keyword3)
    {
        $new = clone $this;
        $new->keyword3 = $keyword3;

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
     * @return RequestDetailsIn
     */
    public function withContacts($contacts)
    {
        $new = clone $this;
        $new->contacts = $contacts;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
     */
    public function getOriginalDocument()
    {
        return $this->originalDocument;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn $originalDocument
     * @return RequestDetailsIn
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
     * @return RequestDetailsIn
     */
    public function withProducts($products)
    {
        $new = clone $this;
        $new->products = $products;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
     */
    public function getAuxiliaryDocuments()
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn $auxiliaryDocuments
     * @return RequestDetailsIn
     */
    public function withAuxiliaryDocuments($auxiliaryDocuments)
    {
        $new = clone $this;
        $new->auxiliaryDocuments = $auxiliaryDocuments;

        return $new;
    }
}

