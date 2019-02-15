<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ReceiveNotificationsResponse implements ResultInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\DgtNotification[]
     */
    protected $return;

    /**
     * @param DgtNotification ...$returns
     *
     * @return $this
     */
    public function addReturn(...$returns): ReceiveNotificationsResponse
    {
        foreach ($returns as $return) {
            $this->return[] = $return;
        }

        return $this;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\DgtNotification[]
     */
    public function getReturn(): ?array
    {
        return $this->return;
    }

    /**
     * @return bool
     */
    public function hasReturn(): bool
    {
        if (\is_array($this->return)) {
            return !empty($this->return);
        }

        return isset($this->return);
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
