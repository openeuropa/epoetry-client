<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocuments
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
     */
    private $document;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut $document
     * @return $this
     */
    public function setDocument($document) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut|null
     */
    public function getDocument() : ?\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
    {
        return $this->document;
    }

    /**
     * @return bool
     */
    public function hasDocument() : bool
    {
        return !empty($this->document);
    }
}

