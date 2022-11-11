<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

/**
 * Event fired when the translation of a product is finalized.
 *
 * This event contains the actual translated product.
 */
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
