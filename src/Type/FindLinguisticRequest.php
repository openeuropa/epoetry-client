<?php

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class FindLinguisticRequest implements RequestInterface
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
     * @var string
     */
    private $productCode;

    /**
     * Constructor
     *
     * @var string $requesterCode
     * @var int $year
     * @var int $number
     * @var int $part
     * @var string $productCode
     */
    public function __construct(string $requesterCode, int $year, int $number, int $part, string $productCode)
    {
        $this->requesterCode = $requesterCode;
        $this->year = $year;
        $this->number = $number;
        $this->part = $part;
        $this->productCode = $productCode;
    }

    /**
     * @return string
     */
    public function getRequesterCode() : string
    {
        return $this->requesterCode;
    }

    /**
     * @param string $requesterCode
     * @return $this
     */
    public function setRequesterCode(string $requesterCode) : \OpenEuropa\EPoetry\Type\FindLinguisticRequest
    {
        $this->requesterCode = $requesterCode;
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
     * @param int $year
     * @return $this
     */
    public function setYear(int $year) : \OpenEuropa\EPoetry\Type\FindLinguisticRequest
    {
        $this->year = $year;
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
     * @param int $number
     * @return $this
     */
    public function setNumber(int $number) : \OpenEuropa\EPoetry\Type\FindLinguisticRequest
    {
        $this->number = $number;
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
     * @param int $part
     * @return $this
     */
    public function setPart(int $part) : \OpenEuropa\EPoetry\Type\FindLinguisticRequest
    {
        $this->part = $part;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductCode() : string
    {
        return $this->productCode;
    }

    /**
     * @param string $productCode
     * @return $this
     */
    public function setProductCode(string $productCode) : \OpenEuropa\EPoetry\Type\FindLinguisticRequest
    {
        $this->productCode = $productCode;
        return $this;
    }
}
