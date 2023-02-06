<?php

namespace OpenEuropa\EPoetry\Notification\Event\Request;

/**
 * Event ired when the status of the linguistic request changes to "rejected".
 */
class StatusChangeRejectedEvent extends BaseEvent
{

    public const NAME = 'epoetry.notification.request_status.change_rejected';
}
