<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestReferenceOut
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    private $dossier;

    /**
     * @var string
     */
    private $productType;

    /**
     * @var int
     */
    private $part;

    /**
     * @var int
     */
    private $version;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\DossierReference $dossier
     * @var string $productType
     * @var int $part
     * @var int $version
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\DossierReference $dossier, string $productType, int $part, int $version)
    {
        $this->dossier = $dossier;
        $this->productType = $productType;
        $this->part = $part;
        $this->version = $version;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DossierReference $dossier
     * @return $this
     */
    public function setDossier(\OpenEuropa\EPoetry\Request\Type\DossierReference $dossier) : \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
    {
        $this->dossier = $dossier;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    public function getDossier() : \OpenEuropa\EPoetry\Request\Type\DossierReference
    {
        return $this->dossier;
    }

    /**
     * @return bool
     */
    public function hasDossier() : bool
    {
        return !empty($this->dossier);
    }

    /**
     * @param string $productType
     * @return $this
     */
    public function setProductType(string $productType) : \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
    {
        $this->productType = $productType;
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
     * @return bool
     */
    public function hasProductType() : bool
    {
        return !empty($this->productType);
    }

    /**
     * @param int $part
     * @return $this
     */
    public function setPart(int $part) : \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
    {
        $this->part = $part;
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
     * @return bool
     */
    public function hasPart() : bool
    {
        return !empty($this->part);
    }

    /**
     * @param int $version
     * @return $this
     */
    public function setVersion(int $version) : \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
    {
        $this->version = $version;
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
     * @return bool
     */
    public function hasVersion() : bool
    {
        return !empty($this->version);
    }
}

