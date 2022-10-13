<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

use OpenEuropa\EPoetry\Notification\Type\Product;

class StatusChangeOngoingEvent extends BaseEvent {

    public const NAME = 'epoetry.notification.product_status_change_ongoing';

    private \DateTime $acceptedDeadline;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Product $product
     * @param \DateTime $acceptedDeadline
     */
    public function __construct(Product $product, \DateTime $acceptedDeadline) {
        parent::__construct($product);
        $this->acceptedDeadline = $acceptedDeadline;
    }

    /**
     * @return \DateTime
     */
    public function getAcceptedDeadline(): \DateTime {
        return $this->acceptedDeadline;
    }

}
