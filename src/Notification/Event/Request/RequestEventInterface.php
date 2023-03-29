<?php

namespace OpenEuropa\EPoetry\Notification\Event\Request;

use OpenEuropa\EPoetry\Notification\Type\LinguisticRequest;

interface RequestEventInterface
{

    /**
     * Get linguistic request object.
     *
     * @return \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest
     */
    public function getLinguisticRequest(): LinguisticRequest;

    /**
     * Get planning agent value.
     *
     * @return string
     */
    public function getPlanningAgent(): string;

    /**
     * Get planning sector value.
     *
     * @return string
     */
    public function getPlanningSector(): string;

    /**
     * Get message value.
     *
     * @return string
     */
    public function getMessage(): string;
}
