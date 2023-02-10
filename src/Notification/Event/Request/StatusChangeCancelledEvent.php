<?php

namespace OpenEuropa\EPoetry\Notification\Event\Request;

/**
 * Event fired when the status of the linguistic request changes to "Cancelled".
 */
class StatusChangeCancelledEvent extends BaseEvent
{
    public const NAME = 'epoetry.notification.request_status.change_cancelled';
}
