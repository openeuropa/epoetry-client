<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ReferenceDocuments
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentIn
     */
    private $document;

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentIn
     */
    public function getDocument()
    {
        return $this->document;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DocumentIn $document
     * @return ReferenceDocuments
     */
    public function withDocument($document)
    {
        $new = clone $this;
        $new->document = $document;

        return $new;
    }
}

