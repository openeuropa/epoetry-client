<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestReferenceOut
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    private $dossier = null;

    /**
     * @var null | 'ERR' | 'EXT' | 'EDT' | 'TRA' | 'RSO' | 'RSE' | 'REV' | 'PER' | 'SPO'
     */
    private $productType = null;

    /**
     * @var null | int
     */
    private $part = null;

    /**
     * @var null | int
     */
    private $version = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\DossierReference $dossier
     * @return $this
     */
    public function setDossier(?\OpenEuropa\EPoetry\Request\Type\DossierReference $dossier): static
    {
        $this->dossier = $dossier;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    public function getDossier(): ?\OpenEuropa\EPoetry\Request\Type\DossierReference
    {
        return $this->dossier;
    }

    /**
     * @return bool
     */
    public function hasDossier(): bool
    {
        return !empty($this->dossier);
    }

    /**
     * @param null | 'ERR' | 'EXT' | 'EDT' | 'TRA' | 'RSO' | 'RSE' | 'REV' | 'PER' | 'SPO' $productType
     * @return $this
     */
    public function setProductType(?string $productType): static
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return null | 'ERR' | 'EXT' | 'EDT' | 'TRA' | 'RSO' | 'RSE' | 'REV' | 'PER' | 'SPO'
     */
    public function getProductType(): ?string
    {
        return $this->productType;
    }

    /**
     * @return bool
     */
    public function hasProductType(): bool
    {
        return !empty($this->productType);
    }

    /**
     * @param null | int $part
     * @return $this
     */
    public function setPart(?int $part): static
    {
        $this->part = $part;
        return $this;
    }

    /**
     * @return null | int
     */
    public function getPart(): ?int
    {
        return $this->part;
    }

    /**
     * @return bool
     */
    public function hasPart(): bool
    {
        return !empty($this->part);
    }

    /**
     * @param null | int $version
     * @return $this
     */
    public function setVersion(?int $version): static
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return null | int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @return bool
     */
    public function hasVersion(): bool
    {
        return !empty($this->version);
    }
}

