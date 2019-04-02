<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification\Type;

class RequestReference
{
    /**
     * @var null|int
     */
    protected $id;

    /**
     * @var null|string
     */
    protected $internalReference;

    /**
     * @var null|string
     */
    protected $internalTechnicalId;

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
    protected $productType;

    /**
     * @var null|string
     */
    protected $requesterCode;

    /**
     * @var null|int
     */
    protected $version;

    /**
     * @var null|int
     */
    protected $year;

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getInternalReference(): ?string
    {
        return $this->internalReference;
    }

    /**
     * @return null|string
     */
    public function getInternalTechnicalId(): ?string
    {
        return $this->internalTechnicalId;
    }

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
    public function getProductType(): ?string
    {
        return $this->productType;
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
    public function getVersion(): ?int
    {
        return $this->version;
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
    public function hasId(): bool
    {
        return !empty($this->id);
    }

    /**
     * @return bool
     */
    public function hasInternalReference(): bool
    {
        return !empty($this->internalReference);
    }

    /**
     * @return bool
     */
    public function hasInternalTechnicalId(): bool
    {
        return !empty($this->internalTechnicalId);
    }

    /**
     * @return bool
     */
    public function hasNumber(): bool
    {
        return !empty($this->number);
    }

    /**
     * @return bool
     */
    public function hasPart(): bool
    {
        return !empty($this->part);
    }

    /**
     * @return bool
     */
    public function hasProductType(): bool
    {
        return !empty($this->productType);
    }

    /**
     * @return bool
     */
    public function hasRequesterCode(): bool
    {
        return !empty($this->requesterCode);
    }

    /**
     * @return bool
     */
    public function hasVersion(): bool
    {
        return !empty($this->version);
    }

    /**
     * @return bool
     */
    public function hasYear(): bool
    {
        return !empty($this->year);
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
