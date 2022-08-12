<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ReferenceDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentIn[]|array
     */
    private $document = [];

    /**
     * @param DocumentIn[] $document
     * @return $this
     */
    public function setDocument(array $document) : \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentIn[]|array
     */
    public function getDocument() : array
    {
        return $this->document;
    }

    /**
     * @param DocumentIn ...$documents
     * @return $this
     */
    public function addDocument(... $documents) : \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments
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

