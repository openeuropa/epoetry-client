<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

use OpenEuropa\EPoetry\Notification\Type\Product;

interface ProductEventInterface
{
    /**
     * Get product object.
     *
     * @return \OpenEuropa\EPoetry\Notification\Type\Product
     */
    public function getProduct(): Product;
}
