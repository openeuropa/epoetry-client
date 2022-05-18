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
     * @return \OpenEuropa\EPoetry\Request\Type\Contacts
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Contacts $contacts
     * @return ModifyRequestDetailsIn
     */
    public function withContacts($contacts)
    {
        $new = clone $this;
        $new->contacts = $contacts;

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
     * @return ModifyRequestDetailsIn
     */
    public function withProducts($products)
    {
        $new = clone $this;
        $new->products = $products;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
     */
    public function getAuxiliaryDocuments()
    {
        return $this->auxiliaryDocuments;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn $auxiliaryDocuments
     * @return ModifyRequestDetailsIn
     */
    public function withAuxiliaryDocuments($auxiliaryDocuments)
    {
        $new = clone $this;
        $new->auxiliaryDocuments = $auxiliaryDocuments;

        return $new;
    }
}

