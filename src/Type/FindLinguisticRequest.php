<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class FindLinguisticRequest implements RequestInterface
{
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
     * @var string
     */
    private $requesterCode;

    /**
     * @var int
     */
    private $year;

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return int
     */
    public function getPart(): int
    {
        return $this->part;
    }

    /**
     * @return string
     */
    public function getProductCode(): string
    {
        return $this->productCode;
    }

    /**
     * @return string
     */
    public function getRequesterCode(): string
    {
        return $this->requesterCode;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $number
     *
     * @return $this
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @param int $part
     *
     * @return $this
     */
    public function setPart(int $part): self
    {
        $this->part = $part;

        return $this;
    }

    /**
     * @param string $productCode
     *
     * @return $this
     */
    public function setProductCode(string $productCode): self
    {
        $this->productCode = $productCode;

        return $this;
    }

    /**
     * @param string $requesterCode
     *
     * @return $this
     */
    public function setRequesterCode(string $requesterCode): self
    {
        $this->requesterCode = $requesterCode;

        return $this;
    }

    /**
     * @param int $year
     *
     * @return $this
     */
    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }
}
