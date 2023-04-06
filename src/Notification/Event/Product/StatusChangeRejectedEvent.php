<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

/**
 * Event fired when the status of the product changes to "Rejected".
 */
class StatusChangeRejectedEvent extends BaseEventWithDeadline
{
    public const NAME = 'epoetry.notification.product_status_change_rejected';
}
