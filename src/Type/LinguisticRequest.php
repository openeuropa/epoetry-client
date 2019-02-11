<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class LinguisticRequest implements RequestInterface
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
     * @var null|\OpenEuropa\EPoetry\Type\RequestGeneralInfo
     */
    protected $generalInfo;

    /**
     * @var null|\OpenEuropa\EPoetry\Type\OriginalDocument
     */
    protected $originalDocument;

    /**
     * @var null|\OpenEuropa\EPoetry\Type\ProductRequests
     */
    protected $productRequests;

    /**
     * @var null|\OpenEuropa\EPoetry\Type\RequestReference
     */
    protected $reference;

    /**
     * @var null|string
     */
    protected $statusCode;

    /**
     * @return null|\OpenEuropa\EPoetry\Type\AuxiliaryDocuments
     */
    public function getAuxiliaryDocuments(): ?AuxiliaryDocuments
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\Contacts
     */
    public function getContacts(): ?Contacts
    {
        return $this->contacts;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\RequestGeneralInfo
     */
    public function getGeneralInfo(): ?RequestGeneralInfo
    {
        return $this->generalInfo;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\OriginalDocument
     */
    public function getOriginalDocument(): ?OriginalDocument
    {
        return $this->originalDocument;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\ProductRequests
     */
    public function getProductRequests(): ?ProductRequests
    {
        return $this->productRequests;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\RequestReference
     */
    public function getReference(): ?RequestReference
    {
        return $this->reference;
    }

    /**
     * @return null|string
     */
    public function getStatusCode(): ?string
    {
        return $this->statusCode;
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
     * @return bool
     */
    public function hasReference(): bool
    {
        return !empty($this->reference);
    }

    /**
     * @return bool
     */
    public function hasStatusCode(): bool
    {
        return !empty($this->statusCode);
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\AuxiliaryDocuments $auxiliaryDocuments
     *
     * @return $this
     */
    public function setAuxiliaryDocuments($auxiliaryDocuments): LinguisticRequest
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\Contacts $contacts
     *
     * @return $this
     */
    public function setContacts($contacts): LinguisticRequest
    {
        $this->contacts = $contacts;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestGeneralInfo $generalInfo
     *
     * @return $this
     */
    public function setGeneralInfo($generalInfo): LinguisticRequest
    {
        $this->generalInfo = $generalInfo;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\OriginalDocument $originalDocument
     *
     * @return $this
     */
    public function setOriginalDocument($originalDocument): LinguisticRequest
    {
        $this->originalDocument = $originalDocument;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ProductRequests $productRequests
     *
     * @return $this
     */
    public function setProductRequests($productRequests): LinguisticRequest
    {
        $this->productRequests = $productRequests;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\RequestReference $reference
     *
     * @return $this
     */
    public function setReference($reference): LinguisticRequest
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @param string $statusCode
     *
     * @return $this
     */
    public function setStatusCode(string $statusCode): LinguisticRequest
    {
        $this->statusCode = $statusCode;

        return $this;
    }
}
