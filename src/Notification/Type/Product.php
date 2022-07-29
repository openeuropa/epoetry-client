<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class Product
{
    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\ProductReference
     */
    private $productReference;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTimeInterface
     */
    private $acceptedDeadline;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $format;

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\ProductReference $productReference
     * @return $this
     */
    public function setProductReference(\OpenEuropa\EPoetry\Notification\Type\ProductReference $productReference) : \OpenEuropa\EPoetry\Notification\Type\Product
    {
        $this->productReference = $productReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\ProductReference
     */
    public function getProductReference() : \OpenEuropa\EPoetry\Notification\Type\ProductReference
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
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status) : \OpenEuropa\EPoetry\Notification\Type\Product
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus() : string
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
    public function setAcceptedDeadline(\DateTimeInterface $acceptedDeadline) : \OpenEuropa\EPoetry\Notification\Type\Product
    {
        $this->acceptedDeadline = $acceptedDeadline;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getAcceptedDeadline() : \DateTimeInterface
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
     * @param string $file
     * @return $this
     */
    public function setFile(string $file) : \OpenEuropa\EPoetry\Notification\Type\Product
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile() : string
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
    public function setName(string $name) : \OpenEuropa\EPoetry\Notification\Type\Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName() : string
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
     * @param string $format
     * @return $this
     */
    public function setFormat(string $format) : \OpenEuropa\EPoetry\Notification\Type\Product
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormat() : string
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

