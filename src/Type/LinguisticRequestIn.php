<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class LinguisticRequestIn
{
    /**
     * @var \OpenEuropa\EPoetry\Type\AuxiliaryDocuments
     */
    protected $auxiliaryDocuments;

    /**
     * @var \OpenEuropa\EPoetry\Type\Contacts
     */
    protected $contacts;

    /**
     * @var \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
     */
    protected $generalInfo;

    /**
     * @var \OpenEuropa\EPoetry\Type\OriginalDocumentIn
     */
    protected $originalDocument;

    /**
     * @var \OpenEuropa\EPoetry\Type\ProductRequests
     */
    protected $productRequests;

    /**
     * @return \OpenEuropa\EPoetry\Type\AuxiliaryDocuments
     */
    public function getAuxiliaryDocuments(): AuxiliaryDocuments
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\Contacts
     */
    public function getContacts(): Contacts
    {
        return $this->contacts;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
     */
    public function getGeneralInfo(): RequestGeneralInfoIn
    {
        return $this->generalInfo;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\OriginalDocumentIn
     */
    public function getOriginalDocument(): OriginalDocumentIn
    {
        return $this->originalDocument;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\ProductRequests
     */
    public function getProductRequests(): ProductRequests
    {
        return $this->productRequests;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\AuxiliaryDocuments $auxiliaryDocuments
     *
     * @return $this
     */
    public function setAuxiliaryDocuments($auxiliaryDocuments): LinguisticRequestIn
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\Contacts $contacts
     *
     * @return $this
     */
    public function setContacts($contacts): LinguisticRequestIn
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestGeneralInfoIn $generalInfo
     *
     * @return $this
     */
    public function setGeneralInfo($generalInfo): LinguisticRequestIn
    {
        $this->generalInfo = $generalInfo;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\OriginalDocumentIn $originalDocument
     *
     * @return $this
     */
    public function setOriginalDocument($originalDocument): LinguisticRequestIn
    {
        $this->originalDocument = $originalDocument;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ProductRequests $productRequests
     *
     * @return $this
     */
    public function setProductRequests($productRequests): LinguisticRequestIn
    {
        $this->productRequests = $productRequests;

        return $this;
    }
}
