<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class LinguisticRequest implements RequestInterface
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
     * @var \OpenEuropa\EPoetry\Type\RequestGeneralInfo
     */
    protected $generalInfo;

    /**
     * @var \OpenEuropa\EPoetry\Type\OriginalDocument
     */
    protected $originalDocument;

    /**
     * @var \OpenEuropa\EPoetry\Type\ProductRequests
     */
    protected $productRequests;

    /**
     * @var \OpenEuropa\EPoetry\Type\RequestReference
     */
    protected $reference;

    /**
     * @var string
     */
    protected $statusCode;

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
     * @return null|\OpenEuropa\EPoetry\Type\RequestGeneralInfo
     */
    public function getGeneralInfo(): ?\OpenEuropa\EPoetry\Type\RequestGeneralInfo
    {
        return $this->generalInfo;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\OriginalDocument
     */
    public function getOriginalDocument(): ?\OpenEuropa\EPoetry\Type\OriginalDocument
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
     * @return null|\OpenEuropa\EPoetry\Type\RequestReference
     */
    public function getReference(): ?\OpenEuropa\EPoetry\Type\RequestReference
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
