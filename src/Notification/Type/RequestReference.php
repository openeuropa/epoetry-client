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
     * @return string
     */
    public function getRequesterCode()
    {
        return $this->requesterCode;
    }

    /**
     * @param string $requesterCode
     * @return RequestReference
     */
    public function withRequesterCode($requesterCode)
    {
        $new = clone $this;
        $new->requesterCode = $requesterCode;

        return $new;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return RequestReference
     */
    public function withYear($year)
    {
        $new = clone $this;
        $new->year = $year;

        return $new;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return RequestReference
     */
    public function withNumber($number)
    {
        $new = clone $this;
        $new->number = $number;

        return $new;
    }

    /**
     * @return int
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param int $part
     * @return RequestReference
     */
    public function withPart($part)
    {
        $new = clone $this;
        $new->part = $part;

        return $new;
    }

    /**
     * @return int
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param int $version
     * @return RequestReference
     */
    public function withVersion($version)
    {
        $new = clone $this;
        $new->version = $version;

        return $new;
    }

    /**
     * @return string
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param string $productType
     * @return RequestReference
     */
    public function withProductType($productType)
    {
        $new = clone $this;
        $new->productType = $productType;

        return $new;
    }
}

