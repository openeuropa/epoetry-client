<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut[]|array
     */
    private $document = [];

    /**
     * @param AuxiliaryDocumentOut[]|null $document
     * @return $this
     */
    public function setDocument(array $document) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut[]|array|null
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

