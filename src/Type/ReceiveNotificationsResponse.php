<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ReceiveNotificationsResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Type\DgtNotification[]
     */
    private $return;

    /**
     * @param \OpenEuropa\EPoetry\Type\DgtNotification $return
     *
     * @return $this
     */
    public function addReturn(DgtNotification $return): self
    {
        $this->return = \is_array($this->return) ? $this->return : [];
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
    public function setReturn($return): self
    {
        $this->return = $return;

        return $this;
    }
}
