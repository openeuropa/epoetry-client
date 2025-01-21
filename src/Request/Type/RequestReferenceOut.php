<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestReferenceOut
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    private $dossier;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ProductServiceType
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
     * @param \OpenEuropa\EPoetry\Request\Type\DossierReference $dossier
     * @return $this
     */
    public function setDossier(\OpenEuropa\EPoetry\Request\Type\DossierReference $dossier) : static
    {
        $this->dossier = $dossier;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DossierReference|null
     */
    public function getDossier() : ?\OpenEuropa\EPoetry\Request\Type\DossierReference
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
     * @param \OpenEuropa\EPoetry\Request\Type\ProductServiceType $productType
     * @return $this
     */
    public function setProductType(\OpenEuropa\EPoetry\Request\Type\ProductServiceType $productType) : static
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ProductServiceType|null
     */
    public function getProductType() : ?\OpenEuropa\EPoetry\Request\Type\ProductServiceType
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
    public function setPart(int $part) : static
    {
        $this->part = $part;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPart() : ?int
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
    public function setVersion(int $version) : static
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getVersion() : ?int
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

