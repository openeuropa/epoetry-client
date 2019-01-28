<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ReceiveNotificationsResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Type\DgtNotification[]
     */
    protected $return;

    /**
     * @param \OpenEuropa\EPoetry\Type\DgtNotification $return
     *
     * @return $this
     */
    public function addReturn($return): ReceiveNotificationsResponse
    {
        $this->return[] = $return;

        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\DgtNotification[]
     */
    public function getReturn(): array
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\DgtNotification $return
     *
     * @return $this
     */
    public function setReturn($return): ReceiveNotificationsResponse
    {
        $this->return = $return;

        return $this;
    }
}
