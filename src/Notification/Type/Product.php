<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class Product
{
    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\ProductReference
     */
    private $productReference;

    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\ProductStatus
     */
    private $status;

    /**
     * @var \DateTimeInterface
     */
    private $acceptedDeadline;

    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\Base64Binary
     */
    private $file;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\DocumentFormat
     */
    private $format;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\ProductReference $productReference
     * @return $this
     */
    public function setProductReference(\OpenEuropa\EPoetry\Notification\Type\ProductReference $productReference) : static
    {
        $this->productReference = $productReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\ProductReference|null
     */
    public function getProductReference() : ?\OpenEuropa\EPoetry\Notification\Type\ProductReference
    {
        return $this->productReference;
    }

    /**
     * @return bool
     */
    public function hasProductReference() : bool
    {
        return !empty($this->productReference);
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\ProductStatus $status
     * @return $this
     */
    public function setStatus(\OpenEuropa\EPoetry\Notification\Type\ProductStatus $status) : static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\ProductStatus|null
     */
    public function getStatus() : ?\OpenEuropa\EPoetry\Notification\Type\ProductStatus
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function hasStatus() : bool
    {
        return !empty($this->status);
    }

    /**
     * @param \DateTimeInterface $acceptedDeadline
     * @return $this
     */
    public function setAcceptedDeadline(\DateTimeInterface $acceptedDeadline) : static
    {
        $this->acceptedDeadline = $acceptedDeadline;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getAcceptedDeadline() : ?\DateTimeInterface
    {
        return $this->acceptedDeadline;
    }

    /**
     * @return bool
     */
    public function hasAcceptedDeadline() : bool
    {
        return !empty($this->acceptedDeadline);
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Base64Binary $file
     * @return $this
     */
    public function setFile(\OpenEuropa\EPoetry\Notification\Type\Base64Binary $file) : static
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\Base64Binary|null
     */
    public function getFile() : ?\OpenEuropa\EPoetry\Notification\Type\Base64Binary
    {
        return $this->file;
    }

    /**
     * @return bool
     */
    public function hasFile() : bool
    {
        return !empty($this->file);
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name) : static
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }

    /**
     * @return bool
     */
    public function hasName() : bool
    {
        return !empty($this->name);
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\DocumentFormat $format
     * @return $this
     */
    public function setFormat(\OpenEuropa\EPoetry\Notification\Type\DocumentFormat $format) : static
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\DocumentFormat|null
     */
    public function getFormat() : ?\OpenEuropa\EPoetry\Notification\Type\DocumentFormat
    {
        return $this->format;
    }

    /**
     * @return bool
     */
    public function hasFormat() : bool
    {
        return !empty($this->format);
    }
}

