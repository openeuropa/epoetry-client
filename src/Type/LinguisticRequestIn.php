<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class LinguisticRequestIn
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\AuxiliaryDocuments
     */
    protected $auxiliaryDocuments;

    /**
     * @var null|\OpenEuropa\EPoetry\Type\Contacts
     */
    protected $contacts;

    /**
     * @var null|\OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
     */
    protected $generalInfo;

    /**
     * @var null|\OpenEuropa\EPoetry\Type\OriginalDocumentIn
     */
    protected $originalDocument;

    /**
     * @var null|\OpenEuropa\EPoetry\Type\ProductRequests
     */
    protected $productRequests;

    /**
     * @return null|\OpenEuropa\EPoetry\Type\AuxiliaryDocuments
     */
    public function getAuxiliaryDocuments(): ?\OpenEuropa\EPoetry\Type\AuxiliaryDocuments
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\Contacts
     */
    public function getContacts(): ?\OpenEuropa\EPoetry\Type\Contacts
    {
        return $this->contacts;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
     */
    public function getGeneralInfo(): ?\OpenEuropa\EPoetry\Type\RequestGeneralInfoIn
    {
        return $this->generalInfo;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\OriginalDocumentIn
     */
    public function getOriginalDocument(): ?\OpenEuropa\EPoetry\Type\OriginalDocumentIn
    {
        return $this->originalDocument;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\ProductRequests
     */
    public function getProductRequests(): ?\OpenEuropa\EPoetry\Type\ProductRequests
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
