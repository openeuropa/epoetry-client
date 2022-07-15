<?php

namespace OpenEuropa\EPoetry\Request\Type;

class Products
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn
     */
    private $product;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn $product
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn $product)
    {
        $this->product = $product;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn $product
     * @return $this
     */
    public function setProduct($product) : \OpenEuropa\EPoetry\Request\Type\Products
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn|null
     */
    public function getProduct() : ?\OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn
    {
        return $this->product;
    }

    /**
     * @return bool
     */
    public function hasProduct() : bool
    {
        return !empty($this->product);
    }
}

