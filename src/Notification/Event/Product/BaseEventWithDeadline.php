<?php

namespace OpenEuropa\EPoetry\Notification\Event\Product;

use OpenEuropa\EPoetry\Notification\Type\Product;

abstract class BaseEventWithDeadline extends BaseEvent implements ProductEventWithDeadlineInterface
{
    private ?\DateTimeInterface $acceptedDeadline;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Product $product
     * @param \DateTimeInterface|null $acceptedDeadline
     */
    public function __construct(Product $product, \DateTimeInterface $acceptedDeadline = null)
    {
        parent::__construct($product);
        $this->acceptedDeadline = $acceptedDeadline;
    }

    /**
     * @inheritDoc
     */
    public function getAcceptedDeadline(): ?\DateTimeInterface
    {
        return $this->acceptedDeadline;
    }
}
