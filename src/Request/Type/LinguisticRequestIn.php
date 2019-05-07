<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class LinguisticRequestIn
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
     */
    protected $auxiliaryDocuments;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\Contacts
     */
    protected $contacts;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\RequestGeneralInfoIn
     */
    protected $generalInfo;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
     */
    protected $originalDocument;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\ProductRequests
     */
    protected $productRequests;

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
     */
    public function getAuxiliaryDocuments(): ?AuxiliaryDocuments
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\Contacts
     */
    public function getContacts(): ?Contacts
    {
        return $this->contacts;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\RequestGeneralInfoIn
     */
    public function getGeneralInfo(): ?RequestGeneralInfoIn
    {
        return $this->generalInfo;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
     */
    public function getOriginalDocument(): ?OriginalDocumentIn
    {
        return $this->originalDocument;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\ProductRequests
     */
    public function getProductRequests(): ?ProductRequests
    {
        return $this->productRequests;
    }

    /**
     * @return bool
     */
    public function hasAuxiliaryDocuments(): bool
    {
        return !empty($this->auxiliaryDocuments);
    }

    /**
     * @return bool
     */
    public function hasContacts(): bool
    {
        return !empty($this->contacts);
    }

    /**
     * @return bool
     */
    public function hasGeneralInfo(): bool
    {
        return !empty($this->generalInfo);
    }

    /**
     * @return bool
     */
    public function hasOriginalDocument(): bool
    {
        return !empty($this->originalDocument);
    }

    /**
     * @return bool
     */
    public function hasProductRequests(): bool
    {
        return !empty($this->productRequests);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments $auxiliaryDocuments
     *
     * @return $this
     */
    public function setAuxiliaryDocuments($auxiliaryDocuments): LinguisticRequestIn
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     *
     * @return $this
     */
    public function setContacts($contacts): LinguisticRequestIn
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestGeneralInfoIn $generalInfo
     *
     * @return $this
     */
    public function setGeneralInfo($generalInfo): LinguisticRequestIn
    {
        $this->generalInfo = $generalInfo;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn $originalDocument
     *
     * @return $this
     */
    public function setOriginalDocument($originalDocument): LinguisticRequestIn
    {
        $this->originalDocument = $originalDocument;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ProductRequests $productRequests
     *
     * @return $this
     */
    public function setProductRequests($productRequests): LinguisticRequestIn
    {
        $this->productRequests = $productRequests;

        return $this;
    }
}
