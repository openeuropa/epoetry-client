<?php

namespace OpenEuropa\EPoetry\Type;

class RequestReference
{

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
     * @var string
     */
    private $productType;

    /**
     * @var string
     */
    private $requesterCode;

    /**
     * Constructor
     *
     * @var int $year
     * @var int $number
     * @var int $part
     * @var int $version
     * @var int $id
     * @var string $internalReference
     * @var string $internalTechnicalId
     * @var string $productType
     * @var string $requesterCode
     */
    public function __construct(int $year, int $number, int $part, int $version, int $id, string $internalReference, string $internalTechnicalId, string $productType, string $requesterCode)
    {
        $this->year = $year;
        $this->number = $number;
        $this->part = $part;
        $this->version = $version;
        $this->id = $id;
        $this->internalReference = $internalReference;
        $this->internalTechnicalId = $internalTechnicalId;
        $this->productType = $productType;
        $this->requesterCode = $requesterCode;
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
    public function setYear(int $year) : \OpenEuropa\EPoetry\Type\RequestReference
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
    public function setNumber(int $number) : \OpenEuropa\EPoetry\Type\RequestReference
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
    public function setPart(int $part) : \OpenEuropa\EPoetry\Type\RequestReference
    {
        $this->part = $part;
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
     * @param int $version
     * @return $this
     */
    public function setVersion(int $version) : \OpenEuropa\EPoetry\Type\RequestReference
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id) : \OpenEuropa\EPoetry\Type\RequestReference
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalReference() : string
    {
        return $this->internalReference;
    }

    /**
     * @param string $internalReference
     * @return $this
     */
    public function setInternalReference(string $internalReference) : \OpenEuropa\EPoetry\Type\RequestReference
    {
        $this->internalReference = $internalReference;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalTechnicalId() : string
    {
        return $this->internalTechnicalId;
    }

    /**
     * @param string $internalTechnicalId
     * @return $this
     */
    public function setInternalTechnicalId(string $internalTechnicalId) : \OpenEuropa\EPoetry\Type\RequestReference
    {
        $this->internalTechnicalId = $internalTechnicalId;
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
     * @param string $productType
     * @return $this
     */
    public function setProductType(string $productType) : \OpenEuropa\EPoetry\Type\RequestReference
    {
        $this->productType = $productType;
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
     * @param string $requesterCode
     * @return $this
     */
    public function setRequesterCode(string $requesterCode) : \OpenEuropa\EPoetry\Type\RequestReference
    {
        $this->requesterCode = $requesterCode;
        return $this;
    }
}
