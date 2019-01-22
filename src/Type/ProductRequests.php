<?php

declare(strict_types = 1);

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
    public function getProductRequest(): ProductRequest
    {
        return $this->productRequest;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ProductRequest $productRequest
     *
     * @return $this
     */
    public function setProductRequest($productRequest): self
    {
        $this->productRequest = $productRequest;

        return $this;
    }
}
