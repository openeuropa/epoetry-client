<?php

namespace OpenEuropa\EPoetry\Request\Type;

class RequestReference
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    private $dossier = null;

    /**
     * @var null | string
     */
    private $productType = null;

    /**
     * @var null | int
     */
    private $part = null;

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
     * @param null | string $productType
     * @return $this
     */
    public function setProductType(?string $productType): static
    {
        $this->productType = $productType;
        return $this;
    }

    /**
     * @return null | string
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
}

