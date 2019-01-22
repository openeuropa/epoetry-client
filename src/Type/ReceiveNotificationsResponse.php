<?php

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ReceiveNotificationsResponse implements ResultInterface
{

    /**
     * @var \OpenEuropa\EPoetry\Type\DgtNotification
     */
    private $return;

    /**
     * @return \OpenEuropa\EPoetry\Type\DgtNotification
     */
    public function getReturn() : \OpenEuropa\EPoetry\Type\DgtNotification
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\DgtNotification $return
     * @return $this
     */
    public function setReturn($return) : \OpenEuropa\EPoetry\Type\ReceiveNotificationsResponse
    {
        $this->return = $return;
        return $this;
    }


}

