<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

use OpenEuropa\EPoetry\Notification\Type\Product;

/**
 * Event fired when the status of the product changes to "ongoing".
 */
class StatusChangeOngoingEvent extends BaseEvent
{

    public const NAME = 'epoetry.notification.product_status_change_ongoing';

    private \DateTimeInterface $acceptedDeadline;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Product $product
     * @param \DateTimeInterface $acceptedDeadline
     */
    public function __construct(Product $product, \DateTimeInterface $acceptedDeadline)
    {
        parent::__construct($product);
        $this->acceptedDeadline = $acceptedDeadline;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getAcceptedDeadline(): \DateTimeInterface
    {
        return $this->acceptedDeadline;
    }
}
