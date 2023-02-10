<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

use OpenEuropa\EPoetry\Notification\Event\BaseNotificationEvent;
use OpenEuropa\EPoetry\Notification\Type\Product;

abstract class BaseEvent extends BaseNotificationEvent
{
    private Product $product;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
}
