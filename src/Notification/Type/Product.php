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
     * @return \OpenEuropa\EPoetry\Notification\Type\ProductReference
     */
    public function getProductReference()
    {
        return $this->productReference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\ProductReference $productReference
     * @return Product
     */
    public function withProductReference($productReference)
    {
        $new = clone $this;
        $new->productReference = $productReference;

        return $new;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return Product
     */
    public function withStatus($status)
    {
        $new = clone $this;
        $new->status = $status;

        return $new;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getAcceptedDeadline()
    {
        return $this->acceptedDeadline;
    }

    /**
     * @param \DateTimeInterface $acceptedDeadline
     * @return Product
     */
    public function withAcceptedDeadline($acceptedDeadline)
    {
        $new = clone $this;
        $new->acceptedDeadline = $acceptedDeadline;

        return $new;
    }

    /**
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return Product
     */
    public function withFile($file)
    {
        $new = clone $this;
        $new->file = $file;

        return $new;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function withName($name)
    {
        $new = clone $this;
        $new->name = $name;

        return $new;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return Product
     */
    public function withFormat($format)
    {
        $new = clone $this;
        $new->format = $format;

        return $new;
    }
}

