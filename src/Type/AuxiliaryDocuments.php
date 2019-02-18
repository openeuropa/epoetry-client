<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class AuxiliaryDocuments
{
    /**
     * @var array|\OpenEuropa\EPoetry\Type\AuxiliaryDocument[]
     */
    protected $auxiliaryDocument = [];

    /**
     * @param AuxiliaryDocument ...$auxiliaryDocuments
     *
     * @return $this
     */
    public function addAuxiliaryDocument(...$auxiliaryDocuments): AuxiliaryDocuments
    {
        $this->auxiliaryDocument = array_merge($this->auxiliaryDocument, $auxiliaryDocuments);

        return $this;
    }

    /**
     * @return array|\OpenEuropa\EPoetry\Type\AuxiliaryDocument[]
     */
    public function getAuxiliaryDocument(): array
    {
        return $this->auxiliaryDocument;
    }

    /**
     * @return bool
     */
    public function hasAuxiliaryDocument(): bool
    {
        if (\is_array($this->auxiliaryDocument)) {
            return !empty($this->auxiliaryDocument);
        }

        return isset($this->auxiliaryDocument);
    }

    /**
     * @param AuxiliaryDocument[] $auxiliaryDocument
     *
     * @return $this
     */
    public function setAuxiliaryDocument(array $auxiliaryDocument): AuxiliaryDocuments
    {
        $this->auxiliaryDocument = $auxiliaryDocument;

        return $this;
    }
}
