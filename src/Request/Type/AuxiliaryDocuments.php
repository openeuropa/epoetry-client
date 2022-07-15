<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
     */
    private $document;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut $document
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut $document)
    {
        $this->document = $document;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut $document
     * @return $this
     */
    public function setDocument(\OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut $document) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocuments
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
     */
    public function getDocument() : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
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

