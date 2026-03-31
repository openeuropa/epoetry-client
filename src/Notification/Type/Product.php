<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class Product
{
    /**
     * @var null | \OpenEuropa\EPoetry\Notification\Type\ProductReference
     */
    private $productReference = null;

    /**
     * @var null | string
     */
    private $status = null;

    /**
     * @var null | \DateTimeInterface
     */
    private $acceptedDeadline = null;

    /**
     * @var null | mixed
     */
    private $file = null;

    /**
     * @var null | string
     */
    private $name = null;

    /**
     * @var null | string
     */
    private $format = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Notification\Type\ProductReference $productReference
     * @return $this
     */
    public function setProductReference(?\OpenEuropa\EPoetry\Notification\Type\ProductReference $productReference): static
    {
        $this->productReference = $productReference;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Notification\Type\ProductReference
     */
    public function getProductReference(): ?\OpenEuropa\EPoetry\Notification\Type\ProductReference
    {
        return $this->productReference;
    }

    /**
     * @return bool
     */
    public function hasProductReference(): bool
    {
        return !empty($this->productReference);
    }

    /**
     * @param null | string $status
     * @return $this
     */
    public function setStatus(?string $status): static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function hasStatus(): bool
    {
        return !empty($this->status);
    }

    /**
     * @param null | \DateTimeInterface $acceptedDeadline
     * @return $this
     */
    public function setAcceptedDeadline(?\DateTimeInterface $acceptedDeadline): static
    {
        $this->acceptedDeadline = $acceptedDeadline;
        return $this;
    }

    /**
     * @return null | \DateTimeInterface
     */
    public function getAcceptedDeadline(): ?\DateTimeInterface
    {
        return $this->acceptedDeadline;
    }

    /**
     * @return bool
     */
    public function hasAcceptedDeadline(): bool
    {
        return !empty($this->acceptedDeadline);
    }

    /**
     * @param null | mixed $file
     * @return $this
     */
    public function setFile(mixed $file): static
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return null | mixed
     */
    public function getFile(): mixed
    {
        return $this->file;
    }

    /**
     * @return bool
     */
    public function hasFile(): bool
    {
        return !empty($this->file);
    }

    /**
     * @param null | string $name
     * @return $this
     */
    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function hasName(): bool
    {
        return !empty($this->name);
    }

    /**
     * @param null | string $format
     * @return $this
     */
    public function setFormat(?string $format): static
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @return bool
     */
    public function hasFormat(): bool
    {
        return !empty($this->format);
    }
}

