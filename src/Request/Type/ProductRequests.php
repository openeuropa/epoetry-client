<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequests
{
    /**
     * @var array|\OpenEuropa\EPoetry\Request\Type\ProductRequest[]
     */
    protected $productRequest = [];

    /**
     * @param ProductRequest ...$productRequests
     *
     * @return $this
     */
    public function addProductRequest(...$productRequests): ProductRequests
    {
        $this->productRequest = array_merge($this->productRequest, $productRequests);

        return $this;
    }

    /**
     * @return array|\OpenEuropa\EPoetry\Request\Type\ProductRequest[]
     */
    public function getProductRequest(): array
    {
        return $this->productRequest;
    }

    /**
     * @return bool
     */
    public function hasProductRequest(): bool
    {
        return !empty($this->productRequest);
    }

    /**
     * @param ProductRequest[] $productRequest
     *
     * @return $this
     */
    public function setProductRequest(array $productRequest): ProductRequests
    {
        $this->productRequest = $productRequest;

        return $this;
    }
}
