<?php

namespace OpenEuropa\EPoetry\Request\Type;

class PrtDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentIn
     */
    private $document;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DocumentIn $document
     * @return $this
     */
    public function setDocument(\OpenEuropa\EPoetry\Request\Type\DocumentIn $document) : \OpenEuropa\EPoetry\Request\Type\PrtDocuments
    {
        $this->document = $document;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentIn
     */
    public function getDocument() : \OpenEuropa\EPoetry\Request\Type\DocumentIn
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

