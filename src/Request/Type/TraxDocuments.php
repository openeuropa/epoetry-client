<?php

namespace OpenEuropa\EPoetry\Request\Type;

class TraxDocuments
{
    /**
     * @var array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\DocumentIn[]|array>
     */
    private $document = [];

    /**
     * @param array<int<0,max>, DocumentIn[]> $document
     * @return $this
     */
    public function setDocument(array $document) : static
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\DocumentIn[]|array>
     */
    public function getDocument() : ?array
    {
        return $this->document;
    }

    /**
     * @param DocumentIn ...$documents
     * @return $this
     */
    public function addDocument(... $documents) : \OpenEuropa\EPoetry\Request\Type\TraxDocuments
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

