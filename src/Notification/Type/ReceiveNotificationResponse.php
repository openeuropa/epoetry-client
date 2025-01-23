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
     * @param \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult $return
     * @return $this
     */
    public function setReturn(\OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult $return) : \OpenEuropa\EPoetry\Notification\Type\ReceiveNotificationResponse
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult|null
     */
    public function getReturn() : ?\OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
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

