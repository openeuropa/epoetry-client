<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification\Type;

class DgtNotification
{
    /**
     * @var null|string
     */
    protected $id;

    /**
     * @var null|\DateTime
     */
    protected $newDeadline;

    /**
     * @var null|string
     */
    protected $newStatus;

    /**
     * @var null|string
     */
    protected $notificationType;

    /**
     * @var null|\OpenEuropa\EPoetry\Notification\Type\ProductReference
     */
    protected $product;

    /**
     * @var null|string
     */
    protected $productFile;

    /**
     * @var null|string
     */
    protected $productFormat;

    /**
     * @var null|\OpenEuropa\EPoetry\Notification\Type\ProductRequests
     */
    protected $productRequests;

    /**
     * @var null|\OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    protected $request;

    /**
     * @var null|string
     */
    protected $statusMessage;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return null|\DateTime
     */
    public function getNewDeadline(): ?\DateTime
    {
        return $this->newDeadline;
    }

    /**
     * @return null|string
     */
    public function getNewStatus(): ?string
    {
        return $this->newStatus;
    }

    /**
     * @return null|string
     */
    public function getNotificationType(): ?string
    {
        return $this->notificationType;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Notification\Type\ProductReference
     */
    public function getProduct(): ?\OpenEuropa\EPoetry\Notification\Type\ProductReference
    {
        return $this->product;
    }

    /**
     * @return null|string
     */
    public function getProductFile(): ?string
    {
        return $this->productFile;
    }

    /**
     * @return null|string
     */
    public function getProductFormat(): ?string
    {
        return $this->productFormat;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Notification\Type\ProductRequests
     */
    public function getProductRequests(): ?\OpenEuropa\EPoetry\Notification\Type\ProductRequests
    {
        return $this->productRequests;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    public function getRequest(): ?\OpenEuropa\EPoetry\Notification\Type\RequestReference
    {
        return $this->request;
    }

    /**
     * @return null|string
     */
    public function getStatusMessage(): ?string
    {
        return $this->statusMessage;
    }

    /**
     * @return bool
     */
    public function hasId(): bool
    {
        return !empty($this->id);
    }

    /**
     * @return bool
     */
    public function hasNewDeadline(): bool
    {
        return !empty($this->newDeadline);
    }

    /**
     * @return bool
     */
    public function hasNewStatus(): bool
    {
        return !empty($this->newStatus);
    }

    /**
     * @return bool
     */
    public function hasNotificationType(): bool
    {
        return !empty($this->notificationType);
    }

    /**
     * @return bool
     */
    public function hasProduct(): bool
    {
        return !empty($this->product);
    }

    /**
     * @return bool
     */
    public function hasProductFile(): bool
    {
        return !empty($this->productFile);
    }

    /**
     * @return bool
     */
    public function hasProductFormat(): bool
    {
        return !empty($this->productFormat);
    }

    /**
     * @return bool
     */
    public function hasProductRequests(): bool
    {
        return !empty($this->productRequests);
    }

    /**
     * @return bool
     */
    public function hasRequest(): bool
    {
        return !empty($this->request);
    }

    /**
     * @return bool
     */
    public function hasStatusMessage(): bool
    {
        return !empty($this->statusMessage);
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function setId(string $id): DgtNotification
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param \DateTime $newDeadline
     *
     * @return $this
     */
    public function setNewDeadline($newDeadline): DgtNotification
    {
        $this->newDeadline = $newDeadline;

        return $this;
    }

    /**
     * @param string $newStatus
     *
     * @return $this
     */
    public function setNewStatus(string $newStatus): DgtNotification
    {
        $this->newStatus = $newStatus;

        return $this;
    }

    /**
     * @param string $notificationType
     *
     * @return $this
     */
    public function setNotificationType(string $notificationType): DgtNotification
    {
        $this->notificationType = $notificationType;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\ProductReference $product
     *
     * @return $this
     */
    public function setProduct($product): DgtNotification
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @param string $productFile
     *
     * @return $this
     */
    public function setProductFile(string $productFile): DgtNotification
    {
        $this->productFile = $productFile;

        return $this;
    }

    /**
     * @param string $productFormat
     *
     * @return $this
     */
    public function setProductFormat(string $productFormat): DgtNotification
    {
        $this->productFormat = $productFormat;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\ProductRequests $productRequests
     *
     * @return $this
     */
    public function setProductRequests($productRequests): DgtNotification
    {
        $this->productRequests = $productRequests;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\RequestReference $request
     *
     * @return $this
     */
    public function setRequest($request): DgtNotification
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @param string $statusMessage
     *
     * @return $this
     */
    public function setStatusMessage(string $statusMessage): DgtNotification
    {
        $this->statusMessage = $statusMessage;

        return $this;
    }
}
