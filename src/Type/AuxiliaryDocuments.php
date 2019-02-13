<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class AuxiliaryDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Type\AuxiliaryDocument[]
     */
    protected $auxiliaryDocument = [];

    /**
     * @param \OpenEuropa\EPoetry\Type\AuxiliaryDocument $auxiliaryDocument
     *
     * @return $this
     */
    public function addAuxiliaryDocument($auxiliaryDocument): AuxiliaryDocuments
    {
        $this->auxiliaryDocument[] = $auxiliaryDocument;

        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\AuxiliaryDocument[]
     */
    public function getAuxiliaryDocument(): array
    {
        return $this->auxiliaryDocument;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\AuxiliaryDocument $auxiliaryDocument
     *
     * @return $this
     */
    public function setAuxiliaryDocument($auxiliaryDocument): AuxiliaryDocuments
    {
        $this->auxiliaryDocument = $auxiliaryDocument;

        return $this;
    }
}
