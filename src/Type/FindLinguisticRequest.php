<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class FindLinguisticRequest implements RequestInterface
{
    /**
     * @var int
     */
    protected $number;

    /**
     * @var int
     */
    protected $part;

    /**
     * @var string
     */
    protected $productCode;

    /**
     * @var string
     */
    protected $requesterCode;

    /**
     * @var int
     */
    protected $year;

    /**
     * @return int
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @return int
     */
    public function getPart(): ?int
    {
        return $this->part;
    }

    /**
     * @return string
     */
    public function getProductCode(): ?string
    {
        return $this->productCode;
    }

    /**
     * @return string
     */
    public function getRequesterCode(): ?string
    {
        return $this->requesterCode;
    }

    /**
     * @return int
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @param int $number
     *
     * @return $this
     */
    public function setNumber(int $number): FindLinguisticRequest
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @param int $part
     *
     * @return $this
     */
    public function setPart(int $part): FindLinguisticRequest
    {
        $this->part = $part;

        return $this;
    }

    /**
     * @param string $productCode
     *
     * @return $this
     */
    public function setProductCode(string $productCode): FindLinguisticRequest
    {
        $this->productCode = $productCode;

        return $this;
    }

    /**
     * @param string $requesterCode
     *
     * @return $this
     */
    public function setRequesterCode(string $requesterCode): FindLinguisticRequest
    {
        $this->requesterCode = $requesterCode;

        return $this;
    }

    /**
     * @param int $year
     *
     * @return $this
     */
    public function setYear(int $year): FindLinguisticRequest
    {
        $this->year = $year;

        return $this;
    }
}
