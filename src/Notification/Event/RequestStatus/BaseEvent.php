<?php

namespace OpenEuropa\EPoetry\Notification\Event\RequestStatus;

use OpenEuropa\EPoetry\Notification\Type\LinguisticRequest;
use Symfony\Contracts\EventDispatcher\Event;

abstract class BaseEvent extends Event {

    private LinguisticRequest $linguisticRequest;

    private string $planningAgent;

    private string $planningSector;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest $linguisticRequest
     * @param string $planningAgent
     * @param string $planningSector
     */
    public function __construct(LinguisticRequest $linguisticRequest, string $planningAgent, string $planningSector) {
        $this->linguisticRequest = $linguisticRequest;
        $this->planningAgent = $planningAgent;
        $this->planningSector = $planningSector;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest
     */
    public function getLinguisticRequest(): LinguisticRequest {
        return $this->linguisticRequest;
    }

    /**
     * @return string
     */
    public function getPlanningAgent(): string {
        return $this->planningAgent;
    }

    /**
     * @return string
     */
    public function getPlanningSector(): string {
        return $this->planningSector;
    }

}
