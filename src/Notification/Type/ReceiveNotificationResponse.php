<?php

namespace OpenEuropa\EPoetry\Notification\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ReceiveNotificationResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
     */
    private $return;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult $return
     */
    public function __construct(\OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult $return)
    {
        $this->return = $return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult $return
     * @return $this
     */
    public function setReturn($return) : \OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
     */
    public function getReturn() : \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
    {
        return $this->return;
    }

    /**
     * @return bool
     */
    public function hasReturn() : bool
    {
        return !empty($this->return);
    }
}

