<?php

namespace OpenEuropa\EPoetry\Request\Type;

class TraxDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentIn[]|array
     */
    private $document = [];

    /**
     * @param DocumentIn[] $document
     * @return $this
     */
    public function setDocument(array $document) : \OpenEuropa\EPoetry\Request\Type\TraxDocuments
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentIn[]|array|null
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

