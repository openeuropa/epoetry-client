<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class DgtNotification
{
    /**
     * @var string
     */
    private $notificationType;

    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest
     */
    private $linguisticRequest;

    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\Product
     */
    private $product;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $planningAgent;

    /**
     * @var string
     */
    private $planningSector;

    /**
     * @return string
     */
    public function getNotificationType()
    {
        return $this->notificationType;
    }

    /**
     * @param string $notificationType
     * @return DgtNotification
     */
    public function withNotificationType($notificationType)
    {
        $new = clone $this;
        $new->notificationType = $notificationType;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest
     */
    public function getLinguisticRequest()
    {
        return $this->linguisticRequest;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest $linguisticRequest
     * @return DgtNotification
     */
    public function withLinguisticRequest($linguisticRequest)
    {
        $new = clone $this;
        $new->linguisticRequest = $linguisticRequest;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Product $product
     * @return DgtNotification
     */
    public function withProduct($product)
    {
        $new = clone $this;
        $new->product = $product;

        return $new;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return DgtNotification
     */
    public function withMessage($message)
    {
        $new = clone $this;
        $new->message = $message;

        return $new;
    }

    /**
     * @return string
     */
    public function getPlanningAgent()
    {
        return $this->planningAgent;
    }

    /**
     * @param string $planningAgent
     * @return DgtNotification
     */
    public function withPlanningAgent($planningAgent)
    {
        $new = clone $this;
        $new->planningAgent = $planningAgent;

        return $new;
    }

    /**
     * @return string
     */
    public function getPlanningSector()
    {
        return $this->planningSector;
    }

    /**
     * @param string $planningSector
     * @return DgtNotification
     */
    public function withPlanningSector($planningSector)
    {
        $new = clone $this;
        $new->planningSector = $planningSector;

        return $new;
    }
}

