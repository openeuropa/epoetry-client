<?php

namespace OpenEuropa\EPoetry\Notification\Event\RequestStatus;

use OpenEuropa\EPoetry\Notification\Type\LinguisticRequest;

/**
 * Event ired when the status of the linguistic request changes to "rejected".
 */
class ChangeRejectedEvent extends BaseEvent {

    public const NAME = 'epoetry.notification.request_status.change_rejected';

    private string $message;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest $linguisticRequest
     * @param string $planningAgent
     * @param string $planningSector
     * @param string $message
     */
    public function __construct(LinguisticRequest $linguisticRequest, string $planningAgent, string $planningSector, string $message) {
        parent::__construct($linguisticRequest, $planningAgent, $planningSector);
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string {
        return $this->message;
    }

}
