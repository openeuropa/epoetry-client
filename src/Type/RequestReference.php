<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class RequestReference
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $internalReference;

    /**
     * @var string
     */
    private $internalTechnicalId;

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
    private $productType;

    /**
     * @var string
     */
    private $requesterCode;

    /**
     * @var int
     */
    private $version;

    /**
     * @var int
     */
    private $year;

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
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $internalReference
     *
     * @return $this
     */
    public function setInternalReference(string $internalReference): self
    {
        $this->internalReference = $internalReference;

        return $this;
    }

    /**
     * @param string $internalTechnicalId
     *
     * @return $this
     */
    public function setInternalTechnicalId(string $internalTechnicalId): self
    {
        $this->internalTechnicalId = $internalTechnicalId;

        return $this;
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
     * @param string $productType
     *
     * @return $this
     */
    public function setProductType(string $productType): self
    {
        $this->productType = $productType;

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
     * @param int $version
     *
     * @return $this
     */
    public function setVersion(int $version): self
    {
        $this->version = $version;

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
