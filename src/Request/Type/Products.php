<?php

namespace OpenEuropa\EPoetry\Request\Type;

class Products
{
    /**
     * @var array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn>
     */
    private $product = [];

    /**
     * @param array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn> $product
     * @return $this
     */
    public function setProduct(array $product): static
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn>
     */
    public function getProduct(): array
    {
        return $this->product;
    }

    /**
     * @param ModifyProductRequestIn ...$products
     * @return $this
     */
    public function addProduct(... $products): \OpenEuropa\EPoetry\Request\Type\Products
    {
        $this->product = array_merge($this->product, $products);return $this;
    }

    /**
     * @return bool
     */
    public function hasProduct(): bool
    {
        return !empty($this->product);
    }
}

