<?php

namespace OpenEuropa\EPoetry\Request\Type;

class Products
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn[]|array
     */
    private $product = [];

    /**
     * @param ModifyProductRequestIn[]|null $product
     * @return $this
     */
    public function setProduct(array $product) : \OpenEuropa\EPoetry\Request\Type\Products
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn[]|array|null
     */
    public function getProduct() : array
    {
        return $this->product;
    }

    /**
     * @param ModifyProductRequestIn ...$products
     * @return $this
     */
    public function addProduct(... $products) : \OpenEuropa\EPoetry\Request\Type\Products
    {
        $this->product = array_merge($this->product, $products);return $this;
    }

    /**
     * @return bool
     */
    public function hasProduct() : bool
    {
        return !empty($this->product);
    }
}

