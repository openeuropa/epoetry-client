<?php

namespace OpenEuropa\EPoetry\Type;

class LinguisticRequestIn
{

    /**
     * @var \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
     */
    private $generalInfo;

    /**
     * @var \OpenEuropa\EPoetry\Type\Contacts
     */
    private $contacts;

    /**
     * @var \OpenEuropa\EPoetry\Type\OriginalDocumentIn
     */
    private $originalDocument;

    /**
     * @var \OpenEuropa\EPoetry\Type\ProductRequests
     */
    private $productRequests;

    /**
     * @var \OpenEuropa\EPoetry\Type\AuxiliaryDocuments
     */
    private $auxiliaryDocuments;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn $generalInfo
     * @var \OpenEuropa\EPoetry\Type\Contacts $contacts
     * @var \OpenEuropa\EPoetry\Type\OriginalDocumentIn $originalDocument
     * @var \OpenEuropa\EPoetry\Type\ProductRequests $productRequests
     * @var \OpenEuropa\EPoetry\Type\AuxiliaryDocuments $auxiliaryDocuments
     */
    public function __construct(\OpenEuropa\EPoetry\Type\RequestGeneralInfoIn $generalInfo, \OpenEuropa\EPoetry\Type\Contacts $contacts, \OpenEuropa\EPoetry\Type\OriginalDocumentIn $originalDocument, \OpenEuropa\EPoetry\Type\ProductRequests $productRequests, \OpenEuropa\EPoetry\Type\AuxiliaryDocuments $auxiliaryDocuments)
    {
        $this->generalInfo = $generalInfo;
        $this->contacts = $contacts;
        $this->originalDocument = $originalDocument;
        $this->productRequests = $productRequests;
        $this->auxiliaryDocuments = $auxiliaryDocuments;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
     */
    public function getGeneralInfo() : \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
    {
        return $this->generalInfo;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn $generalInfo
     * @return $this
     */
    public function setGeneralInfo($generalInfo) : \OpenEuropa\EPoetry\Type\LinguisticRequestIn
    {
        $this->generalInfo = $generalInfo;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\Contacts
     */
    public function getContacts() : \OpenEuropa\EPoetry\Type\Contacts
    {
        return $this->contacts;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\Contacts $contacts
     * @return $this
     */
    public function setContacts($contacts) : \OpenEuropa\EPoetry\Type\LinguisticRequestIn
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\OriginalDocumentIn
     */
    public function getOriginalDocument() : \OpenEuropa\EPoetry\Type\OriginalDocumentIn
    {
        return $this->originalDocument;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\OriginalDocumentIn $originalDocument
     * @return $this
     */
    public function setOriginalDocument($originalDocument) : \OpenEuropa\EPoetry\Type\LinguisticRequestIn
    {
        $this->originalDocument = $originalDocument;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\ProductRequests
     */
    public function getProductRequests() : \OpenEuropa\EPoetry\Type\ProductRequests
    {
        return $this->productRequests;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ProductRequests $productRequests
     * @return $this
     */
    public function setProductRequests($productRequests) : \OpenEuropa\EPoetry\Type\LinguisticRequestIn
    {
        $this->productRequests = $productRequests;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\AuxiliaryDocuments
     */
    public function getAuxiliaryDocuments() : \OpenEuropa\EPoetry\Type\AuxiliaryDocuments
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\AuxiliaryDocuments $auxiliaryDocuments
     * @return $this
     */
    public function setAuxiliaryDocuments($auxiliaryDocuments) : \OpenEuropa\EPoetry\Type\LinguisticRequestIn
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;
        return $this;
    }
}
