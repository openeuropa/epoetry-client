<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class ProductRequests
{
    /**
     * @var \OpenEuropa\EPoetry\Type\ProductRequest[]
     */
    protected $productRequest;

    /**
     * @param \OpenEuropa\EPoetry\Type\ProductRequest $productRequest
     *
     * @return $this
     */
    public function addProductRequest($productRequest): ProductRequests
    {
        $this->productRequest[] = $productRequest;

        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\ProductRequest[]
     */
    public function getProductRequest(): array
    {
        return $this->productRequest;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ProductRequest $productRequest
     *
     * @return $this
     */
    public function setProductRequest($productRequest): ProductRequests
    {
        $this->productRequest = $productRequest;

        return $this;
    }
}
