<?php

namespace OpenEuropa\EPoetry\Type;

class ProductRequests
{

    /**
     * @var \OpenEuropa\EPoetry\Type\ProductRequest
     */
    private $productRequest;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\ProductRequest $productRequest
     */
    public function __construct(\OpenEuropa\EPoetry\Type\ProductRequest $productRequest)
    {
        $this->productRequest = $productRequest;
    }

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
