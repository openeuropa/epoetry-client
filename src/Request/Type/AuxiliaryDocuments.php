<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocuments
{
    /**
     * @var array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut>
     */
    private $document = [];

    /**
     * @param array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut> $document
     * @return $this
     */
    public function setDocument(array $document) : static
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut>
     */
    public function getDocument() : array
    {
        return $this->document;
    }

    /**
     * @param AuxiliaryDocumentOut ...$documents
     * @return $this
     */
    public function addDocument(... $documents) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
    {
        $this->document = array_merge($this->document, $documents);return $this;
    }

    /**
     * @return bool
     */
    public function hasDocument() : bool
    {
        return !empty($this->document);
    }
}

