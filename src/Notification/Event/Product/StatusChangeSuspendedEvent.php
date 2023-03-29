<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

/**
 * Event fired when the status of the product changes to "Suspended".
 */
class StatusChangeSuspendedEvent extends BaseEventWithDeadline
{
    public const NAME = 'epoetry.notification.product_status_change_suspended';
}
