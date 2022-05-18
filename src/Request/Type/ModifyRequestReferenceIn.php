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
     * @return \OpenEuropa\EPoetry\Request\Type\DossierReference
     */
    public function getDossier()
    {
        return $this->dossier;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DossierReference $dossier
     * @return ModifyRequestReferenceIn
     */
    public function withDossier($dossier)
    {
        $new = clone $this;
        $new->dossier = $dossier;

        return $new;
    }

    /**
     * @return string
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param string $productType
     * @return ModifyRequestReferenceIn
     */
    public function withProductType($productType)
    {
        $new = clone $this;
        $new->productType = $productType;

        return $new;
    }

    /**
     * @return int
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param int $part
     * @return ModifyRequestReferenceIn
     */
    public function withPart($part)
    {
        $new = clone $this;
        $new->part = $part;

        return $new;
    }
}

