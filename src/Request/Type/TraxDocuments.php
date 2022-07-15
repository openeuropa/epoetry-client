<?php

namespace OpenEuropa\EPoetry\Request\Type;

class TraxDocuments
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\DocumentIn
     */
    private $document;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentIn $document
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\DocumentIn $document)
    {
        $this->document = $document;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DocumentIn $document
     * @return $this
     */
    public function setDocument($document) : \OpenEuropa\EPoetry\Request\Type\TraxDocuments
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentIn|null
     */
    public function getDocument() : ?\OpenEuropa\EPoetry\Request\Type\DocumentIn
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

