<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class AuxiliaryDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Type\AuxiliaryDocument[]
     */
    private $auxiliaryDocument;

    /**
     * @param \OpenEuropa\EPoetry\Type\AuxiliaryDocument $auxiliaryDocument
     *
     * @return $this
     */
    public function addAuxiliaryDocument(AuxiliaryDocument $auxiliaryDocument): self
    {
        $this->auxiliaryDocument = \is_array($this->auxiliaryDocument) ? $this->auxiliaryDocument : [];
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
    public function setAuxiliaryDocument($auxiliaryDocument): self
    {
        $this->auxiliaryDocument = $auxiliaryDocument;

        return $this;
    }
}
