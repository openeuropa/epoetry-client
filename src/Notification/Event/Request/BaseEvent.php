<?php

namespace OpenEuropa\EPoetry\Notification\Event\Request;

use OpenEuropa\EPoetry\Notification\Event\BaseNotificationEvent;
use OpenEuropa\EPoetry\Notification\Type\LinguisticRequest;

abstract class BaseEvent extends BaseNotificationEvent implements RequestEventInterface
{
    private LinguisticRequest $linguisticRequest;

    private string $planningAgent;

    private string $planningSector;

    private string $message;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest $linguisticRequest
     * @param string $planningAgent
     * @param string $planningSector
     * @param string $message
     */
    public function __construct(LinguisticRequest $linguisticRequest, string $planningAgent, string $planningSector, string $message = '')
    {
        $this->linguisticRequest = $linguisticRequest;
        $this->planningAgent = $planningAgent;
        $this->planningSector = $planningSector;
        $this->message = $message;
    }

    /**
     * @inheritDoc
     */
    public function getLinguisticRequest(): LinguisticRequest
    {
        return $this->linguisticRequest;
    }

    /**
     * @inheritDoc
     */
    public function getPlanningAgent(): string
    {
        return $this->planningAgent;
    }

    /**
     * @inheritDoc
     */
    public function getPlanningSector(): string
    {
        return $this->planningSector;
    }

    /**
     * @inheritDoc
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}
