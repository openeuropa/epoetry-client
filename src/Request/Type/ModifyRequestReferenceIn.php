<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ModifyRequestReferenceIn
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
     * @param \OpenEuropa\EPoetry\Request\Type\DossierReference|null $dossier
     * @return $this
     */
    public function setDossier(?\OpenEuropa\EPoetry\Request\Type\DossierReference $dossier) : \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn
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
    public function setProductType(?string $productType) : \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn
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
    public function setPart(?int $part) : \OpenEuropa\EPoetry\Request\Type\ModifyRequestReferenceIn
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
}

