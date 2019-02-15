<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class FindLinguisticRequest implements RequestInterface
{
    /**
     * @var null|int
     */
    protected $number;

    /**
     * @var null|int
     */
    protected $part;

    /**
     * @var null|string
     */
    protected $productCode;

    /**
     * @var null|string
     */
    protected $requesterCode;

    /**
     * @var null|int
     */
    protected $year;

    /**
     * @return null|int
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @return null|int
     */
    public function getPart(): ?int
    {
        return $this->part;
    }

    /**
     * @return null|string
     */
    public function getProductCode(): ?string
    {
        return $this->productCode;
    }

    /**
     * @return null|string
     */
    public function getRequesterCode(): ?string
    {
        return $this->requesterCode;
    }

    /**
     * @return null|int
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @return bool
     */
    public function hasNumber(): bool
    {
        if (\is_array($this->number)) {
            return !empty($this->number);
        }

        return isset($this->number);
    }

    /**
     * @return bool
     */
    public function hasPart(): bool
    {
        if (\is_array($this->part)) {
            return !empty($this->part);
        }

        return isset($this->part);
    }

    /**
     * @return bool
     */
    public function hasProductCode(): bool
    {
        if (\is_array($this->productCode)) {
            return !empty($this->productCode);
        }

        return isset($this->productCode);
    }

    /**
     * @return bool
     */
    public function hasRequesterCode(): bool
    {
        if (\is_array($this->requesterCode)) {
            return !empty($this->requesterCode);
        }

        return isset($this->requesterCode);
    }

    /**
     * @return bool
     */
    public function hasYear(): bool
    {
        if (\is_array($this->year)) {
            return !empty($this->year);
        }

        return isset($this->year);
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
