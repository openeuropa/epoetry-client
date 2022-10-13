<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

use OpenEuropa\EPoetry\Notification\Type\Product;
use Symfony\Contracts\EventDispatcher\Event;

abstract class BaseEvent extends Event {

    private Product $product;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Product $product
     */
    public function __construct(Product $product) {
        $this->product = $product;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\Product
     */
    public function getProduct(): Product {
        return $this->product;
    }

}
