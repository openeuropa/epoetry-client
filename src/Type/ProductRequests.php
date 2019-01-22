<?php

namespace OpenEuropa\EPoetry\Type;

class ProductRequests
{

    /**
     * @var \OpenEuropa\EPoetry\Type\ProductRequest
     */
    private $productRequest;

    /**
     * @return \OpenEuropa\EPoetry\Type\ProductRequest
     */
    public function getProductRequest() : \OpenEuropa\EPoetry\Type\ProductRequest
    {
        return $this->productRequest;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ProductRequest $productRequest
     * @return $this
     */
    public function setProductRequest($productRequest) : \OpenEuropa\EPoetry\Type\ProductRequests
    {
        $this->productRequest = $productRequest;
        return $this;
    }


}

