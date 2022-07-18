<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class RequestReference
{
    /**
     * @var string
     */
    private $requesterCode;

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
     * @var string
     */
    private $productType;

    /**
     * @param string $requesterCode
     * @return $this
     */
    public function setRequesterCode(string $requesterCode) : \OpenEuropa\EPoetry\Notification\Type\RequestReference
    {
        $this->requesterCode = $requesterCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequesterCode() : string
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
    public function setYear(int $year) : \OpenEuropa\EPoetry\Notification\Type\RequestReference
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
    public function setNumber(int $number) : \OpenEuropa\EPoetry\Notification\Type\RequestReference
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
    public function setPart(int $part) : \OpenEuropa\EPoetry\Notification\Type\RequestReference
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
    public function setVersion(int $version) : \OpenEuropa\EPoetry\Notification\Type\RequestReference
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
     * @param string $productType
     * @return $this
     */
    public function setProductType(string $productType) : \OpenEuropa\EPoetry\Notification\Type\RequestReference
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductType() : string
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

