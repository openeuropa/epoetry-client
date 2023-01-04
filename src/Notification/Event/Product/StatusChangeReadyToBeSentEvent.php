<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

/**
 * Event fired when the status of the product changes to "ReadyToBeSent".
 */
class StatusChangeReadyToBeSentEvent extends BaseEvent
{

    public const NAME = 'epoetry.notification.product_status_change_ready_to_be_sent';
}
