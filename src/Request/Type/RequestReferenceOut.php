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
     * @param \OpenEuropa\EPoetry\Request\Type\DossierReference|null $dossier
     * @return $this
     */
    public function setDossier(?\OpenEuropa\EPoetry\Request\Type\DossierReference $dossier) : \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
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
     * @param string|null $productType
     * @return $this
     */
    public function setProductType(?string $productType) : \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductType() : ?string
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
     * @param int|null $part
     * @return $this
     */
    public function setPart(?int $part) : \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
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
     * @param int|null $version
     * @return $this
     */
    public function setVersion(?int $version) : \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
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

