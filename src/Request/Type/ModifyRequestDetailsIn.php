<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ModifyRequestDetailsIn
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    private $contacts;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Products
     */
    private $products;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
     */
    private $auxiliaryDocuments;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     * @var \OpenEuropa\EPoetry\Request\Type\Products $products
     * @var \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn $auxiliaryDocuments
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\Contacts $contacts, \OpenEuropa\EPoetry\Request\Type\Products $products, \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn $auxiliaryDocuments)
    {
        $this->contacts = $contacts;
        $this->products = $products;
        $this->auxiliaryDocuments = $auxiliaryDocuments;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     * @return $this
     */
    public function setContacts($contacts) : \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    public function getContacts() : \OpenEuropa\EPoetry\Request\Type\Contacts
    {
        return $this->contacts;
    }

    /**
     * @return bool
     */
    public function hasContacts() : bool
    {
        return !empty($this->contacts);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Products $products
     * @return $this
     */
    public function setProducts($products) : \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn
    {
        $this->products = $products;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Products
     */
    public function getProducts() : \OpenEuropa\EPoetry\Request\Type\Products
    {
        return $this->products;
    }

    /**
     * @return bool
     */
    public function hasProducts() : bool
    {
        return !empty($this->products);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn $auxiliaryDocuments
     * @return $this
     */
    public function setAuxiliaryDocuments($auxiliaryDocuments) : \OpenEuropa\EPoetry\Request\Type\ModifyRequestDetailsIn
    {
        $this->auxiliaryDocuments = $auxiliaryDocuments;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
     */
    public function getAuxiliaryDocuments() : \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @return bool
     */
    public function hasAuxiliaryDocuments() : bool
    {
        return !empty($this->auxiliaryDocuments);
    }
}

