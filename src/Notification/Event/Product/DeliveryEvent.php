<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

class DeliveryEvent extends BaseEvent {

    public const NAME = 'epoetry.notification.product_delivery';

    /**
     * Decode and return delivery content.
     *
     * @return string
     */
    public function getDeliveryContent(): string {
        $raw = $this->getProduct()->getFile();
        return base64_decode($raw);
    }
}
