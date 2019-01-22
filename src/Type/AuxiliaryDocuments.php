<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class AuxiliaryDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Type\AuxiliaryDocument
     */
    private $auxiliaryDocument;

    /**
     * @return \OpenEuropa\EPoetry\Type\AuxiliaryDocument
     */
    public function getAuxiliaryDocument(): AuxiliaryDocument
    {
        return $this->auxiliaryDocument;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\AuxiliaryDocument $auxiliaryDocument
     *
     * @return $this
     */
    public function setAuxiliaryDocument($auxiliaryDocument): self
    {
        $this->auxiliaryDocument = $auxiliaryDocument;

        return $this;
    }
}
