<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class RequestReference
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $internalReference;

    /**
     * @var string
     */
    protected $internalTechnicalId;

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
    protected $productType;

    /**
     * @var string
     */
    protected $requesterCode;

    /**
     * @var int
     */
    protected $version;

    /**
     * @var int
     */
    protected $year;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getInternalReference(): string
    {
        return $this->internalReference;
    }

    /**
     * @return string
     */
    public function getInternalTechnicalId(): string
    {
        return $this->internalTechnicalId;
    }

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
    public function getProductType(): string
    {
        return $this->productType;
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
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): RequestReference
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $internalReference
     *
     * @return $this
     */
    public function setInternalReference(string $internalReference): RequestReference
    {
        $this->internalReference = $internalReference;

        return $this;
    }

    /**
     * @param string $internalTechnicalId
     *
     * @return $this
     */
    public function setInternalTechnicalId(string $internalTechnicalId): RequestReference
    {
        $this->internalTechnicalId = $internalTechnicalId;

        return $this;
    }

    /**
     * @param int $number
     *
     * @return $this
     */
    public function setNumber(int $number): RequestReference
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @param int $part
     *
     * @return $this
     */
    public function setPart(int $part): RequestReference
    {
        $this->part = $part;

        return $this;
    }

    /**
     * @param string $productType
     *
     * @return $this
     */
    public function setProductType(string $productType): RequestReference
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * @param string $requesterCode
     *
     * @return $this
     */
    public function setRequesterCode(string $requesterCode): RequestReference
    {
        $this->requesterCode = $requesterCode;

        return $this;
    }

    /**
     * @param int $version
     *
     * @return $this
     */
    public function setVersion(int $version): RequestReference
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @param int $year
     *
     * @return $this
     */
    public function setYear(int $year): RequestReference
    {
        $this->year = $year;

        return $this;
    }
}
