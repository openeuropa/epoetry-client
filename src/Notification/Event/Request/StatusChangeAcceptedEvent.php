<?php

namespace OpenEuropa\EPoetry\Notification\Event\Request;

/**
 * Event fired when the status of the linguistic request changes to "Accepted".
 */
class StatusChangeAcceptedEvent extends BaseEvent
{
    public const NAME = 'epoetry.notification.request_status.change_accepted';
}
