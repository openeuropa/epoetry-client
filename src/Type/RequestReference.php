<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

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
        if (\is_array($this->id)) {
            return !empty($this->id);
        }

        return isset($this->id);
    }

    /**
     * @return bool
     */
    public function hasInternalReference(): bool
    {
        if (\is_array($this->internalReference)) {
            return !empty($this->internalReference);
        }

        return isset($this->internalReference);
    }

    /**
     * @return bool
     */
    public function hasInternalTechnicalId(): bool
    {
        if (\is_array($this->internalTechnicalId)) {
            return !empty($this->internalTechnicalId);
        }

        return isset($this->internalTechnicalId);
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
    public function hasProductType(): bool
    {
        if (\is_array($this->productType)) {
            return !empty($this->productType);
        }

        return isset($this->productType);
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
    public function hasVersion(): bool
    {
        if (\is_array($this->version)) {
            return !empty($this->version);
        }

        return isset($this->version);
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
