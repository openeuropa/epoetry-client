<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
     */
    private $document;

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut $document
     * @return AuxiliaryDocuments
     */
    public function withDocument($document)
    {
        $new = clone $this;
        $new->document = $document;

        return $new;
    }
}

