<?php

namespace OpenEuropa\EPoetry\Notification\Event\RequestStatus;

/**
 * Event fired when the status of the linguistic request changes to "accepted".
 */
class ChangeAcceptedEvent extends BaseEvent
{

    public const NAME = 'epoetry.notification.request_status.change_accepted';
}
