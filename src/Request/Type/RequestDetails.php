<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestDetails
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    private $contacts;

    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\Products
     */
    private $products = null;

    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
     */
    private $auxiliaryDocuments = null;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     * @return $this
     */
    public function setContacts(\OpenEuropa\EPoetry\Request\Type\Contacts $contacts): static
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    public function getContacts(): \OpenEuropa\EPoetry\Request\Type\Contacts
    {
        return $this->contacts;
    }

    /**
     * @return bool
     */
    public function hasContacts(): bool
    {
        return !empty($this->contacts);
    }

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\Products $products
     * @return $this
     */
    public function setProducts(?\OpenEuropa\EPoetry\Request\Type\Products $products): static
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\Products
     */
    public function getProducts(): ?\OpenEuropa\EPoetry\Request\Type\Products
    {
        return $this->products;
    }

    /**
     * @return bool
     */
    public function hasProducts(): bool
    {
        return !empty($this->products);
    }

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn $auxiliaryDocuments
     * @return $this
     */
    public function setAuxiliaryDocuments(?\OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn $auxiliaryDocuments): static
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
     */
    public function getAuxiliaryDocuments(): ?\OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @return bool
     */
    public function hasAuxiliaryDocuments(): bool
    {
        return !empty($this->auxiliaryDocuments);
    }
}

