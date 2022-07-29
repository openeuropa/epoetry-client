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
     * @param string $notificationType
     * @return $this
     */
    public function setNotificationType(string $notificationType) : \OpenEuropa\EPoetry\Notification\Type\DgtNotification
    {
        $this->notificationType = $notificationType;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotificationType() : string
    {
        return $this->notificationType;
    }

    /**
     * @return bool
     */
    public function hasNotificationType() : bool
    {
        return !empty($this->notificationType);
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest $linguisticRequest
     * @return $this
     */
    public function setLinguisticRequest(\OpenEuropa\EPoetry\Notification\Type\LinguisticRequest $linguisticRequest) : \OpenEuropa\EPoetry\Notification\Type\DgtNotification
    {
        $this->linguisticRequest = $linguisticRequest;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest
     */
    public function getLinguisticRequest() : \OpenEuropa\EPoetry\Notification\Type\LinguisticRequest
    {
        return $this->linguisticRequest;
    }

    /**
     * @return bool
     */
    public function hasLinguisticRequest() : bool
    {
        return !empty($this->linguisticRequest);
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Product $product
     * @return $this
     */
    public function setProduct(\OpenEuropa\EPoetry\Notification\Type\Product $product) : \OpenEuropa\EPoetry\Notification\Type\DgtNotification
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\Product
     */
    public function getProduct() : \OpenEuropa\EPoetry\Notification\Type\Product
    {
        return $this->product;
    }

    /**
     * @return bool
     */
    public function hasProduct() : bool
    {
        return !empty($this->product);
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message) : \OpenEuropa\EPoetry\Notification\Type\DgtNotification
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function hasMessage() : bool
    {
        return !empty($this->message);
    }

    /**
     * @param string $planningAgent
     * @return $this
     */
    public function setPlanningAgent(string $planningAgent) : \OpenEuropa\EPoetry\Notification\Type\DgtNotification
    {
        $this->planningAgent = $planningAgent;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlanningAgent() : string
    {
        return $this->planningAgent;
    }

    /**
     * @return bool
     */
    public function hasPlanningAgent() : bool
    {
        return !empty($this->planningAgent);
    }

    /**
     * @param string $planningSector
     * @return $this
     */
    public function setPlanningSector(string $planningSector) : \OpenEuropa\EPoetry\Notification\Type\DgtNotification
    {
        $this->planningSector = $planningSector;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlanningSector() : string
    {
        return $this->planningSector;
    }

    /**
     * @return bool
     */
    public function hasPlanningSector() : bool
    {
        return !empty($this->planningSector);
    }
}

