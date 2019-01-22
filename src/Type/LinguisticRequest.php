<?php

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class LinguisticRequest implements RequestInterface
{

    /**
     * @var \OpenEuropa\EPoetry\Type\RequestReference
     */
    private $reference;

    /**
     * @var \OpenEuropa\EPoetry\Type\RequestGeneralInfo
     */
    private $generalInfo;

    /**
     * @var \OpenEuropa\EPoetry\Type\Contacts
     */
    private $contacts;

    /**
     * @var \OpenEuropa\EPoetry\Type\OriginalDocument
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
     * @var string
     */
    private $statusCode;

    /**
     * @return \OpenEuropa\EPoetry\Type\RequestReference
     */
    public function getReference() : \OpenEuropa\EPoetry\Type\RequestReference
    {
        return $this->reference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestReference $reference
     * @return $this
     */
    public function setReference($reference) : \OpenEuropa\EPoetry\Type\LinguisticRequest
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\RequestGeneralInfo
     */
    public function getGeneralInfo() : \OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        return $this->generalInfo;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestGeneralInfo $generalInfo
     * @return $this
     */
    public function setGeneralInfo($generalInfo) : \OpenEuropa\EPoetry\Type\LinguisticRequest
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
    public function setContacts($contacts) : \OpenEuropa\EPoetry\Type\LinguisticRequest
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\OriginalDocument
     */
    public function getOriginalDocument() : \OpenEuropa\EPoetry\Type\OriginalDocument
    {
        return $this->originalDocument;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\OriginalDocument $originalDocument
     * @return $this
     */
    public function setOriginalDocument($originalDocument) : \OpenEuropa\EPoetry\Type\LinguisticRequest
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
    public function setProductRequests($productRequests) : \OpenEuropa\EPoetry\Type\LinguisticRequest
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
    public function setAuxiliaryDocuments($auxiliaryDocuments) : \OpenEuropa\EPoetry\Type\LinguisticRequest
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCode() : string
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     * @return $this
     */
    public function setStatusCode(string $statusCode) : \OpenEuropa\EPoetry\Type\LinguisticRequest
    {
        $this->statusCode = $statusCode;
        return $this;
    }


}

