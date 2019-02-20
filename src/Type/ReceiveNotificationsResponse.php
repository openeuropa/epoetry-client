<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ReceiveNotificationsResponse implements ResultInterface
{
    /**
     * @var array|\OpenEuropa\EPoetry\Type\DgtNotification[]
     */
    protected $return = [];

    /**
     * @param DgtNotification ...$returns
     *
     * @return $this
     */
    public function addReturn(...$returns): ReceiveNotificationsResponse
    {
        $this->return = array_merge($this->return, $returns);

        return $this;
    }

    /**
     * @return array|\OpenEuropa\EPoetry\Type\DgtNotification[]
     */
    public function getReturn(): array
    {
        return $this->return;
    }

    /**
     * @return bool
     */
    public function hasReturn(): bool
    {
        return !empty($this->return);
    }

    /**
     * @param DgtNotification[] $return
     *
     * @return $this
     */
    public function setReturn(array $return): ReceiveNotificationsResponse
    {
        $this->return = $return;

        return $this;
    }
}
