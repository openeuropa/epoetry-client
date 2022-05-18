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
     * @return \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\DgtNotificationResult $return
     * @return ReceiveNotificationResponse
     */
    public function withReturn($return)
    {
        $new = clone $this;
        $new->return = $return;

        return $new;
    }
}

