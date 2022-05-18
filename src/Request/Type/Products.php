<?php

namespace OpenEuropa\EPoetry\Request\Type;

class Products
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn
     */
    private $product;

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ModifyProductRequestIn $product
     * @return Products
     */
    public function withProduct($product)
    {
        $new = clone $this;
        $new->product = $product;

        return $new;
    }
}

