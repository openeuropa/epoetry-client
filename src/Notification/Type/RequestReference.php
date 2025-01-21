<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class RequestReference
{
    /**
     * @var null | string
     */
    private $requesterCode = null;

    /**
     * @var int
     */
    private $year;

    /**
     * @var int
     */
    private $number;

    /**
     * @var int
     */
    private $part;

    /**
     * @var int
     */
    private $version;

    /**
     * @var null | string
     */
    private $productType = null;

    /**
     * @param null | string $requesterCode
     * @return $this
     */
    public function setRequesterCode(?string $requesterCode) : static
    {
        $this->requesterCode = $requesterCode;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getRequesterCode() : ?string
    {
        return $this->requesterCode;
    }

    /**
     * @return bool
     */
    public function hasRequesterCode() : bool
    {
        return !empty($this->requesterCode);
    }

    /**
     * @param int $year
     * @return $this
     */
    public function setYear(int $year) : static
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return int
     */
    public function getYear() : int
    {
        return $this->year;
    }

    /**
     * @return bool
     */
    public function hasYear() : bool
    {
        return !empty($this->year);
    }

    /**
     * @param int $number
     * @return $this
     */
    public function setNumber(int $number) : static
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumber() : int
    {
        return $this->number;
    }

    /**
     * @return bool
     */
    public function hasNumber() : bool
    {
        return !empty($this->number);
    }

    /**
     * @param int $part
     * @return $this
     */
    public function setPart(int $part) : static
    {
        $this->part = $part;
        return $this;
    }

    /**
     * @return int
     */
    public function getPart() : int
    {
        return $this->part;
    }

    /**
     * @return bool
     */
    public function hasPart() : bool
    {
        return !empty($this->part);
    }

    /**
     * @param int $version
     * @return $this
     */
    public function setVersion(int $version) : static
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion() : int
    {
        return $this->version;
    }

    /**
     * @return bool
     */
    public function hasVersion() : bool
    {
        return !empty($this->version);
    }

    /**
     * @param null | string $productType
     * @return $this
     */
    public function setProductType(?string $productType) : static
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getProductType() : ?string
    {
        return $this->productType;
    }

    /**
     * @return bool
     */
    public function hasProductType() : bool
    {
        return !empty($this->productType);
    }
}

