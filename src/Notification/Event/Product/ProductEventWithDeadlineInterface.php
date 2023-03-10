<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

interface ProductEventWithDeadlineInterface extends ProductEventInterface
{
    /**
     * Get accepted deadline, if any.
     *
     * @return \DateTimeInterface|null
     */
    public function getAcceptedDeadline(): ?\DateTimeInterface;
}
