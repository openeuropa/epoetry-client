<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification;

class NotificationHandler
{
    /**
     * @var array
     */
    public $debug;

    /**
     * @todo dispatch an event.
     *
     * @param mixed $method
     * @param mixed $args
     */
    public function __call($method, $args)
    {
        $this->debug = [$method => $args];
    }

    /**
     * Make it possible to debug the last request.
     *
     * @return array
     */
    public function debugLastServerCall()
    {
        return $this->debug;
    }
}
