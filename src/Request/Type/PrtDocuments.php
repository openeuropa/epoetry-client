<?php

namespace OpenEuropa\EPoetry\Request\Type;

class PrtDocuments
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
     * @return PrtDocuments
     */
    public function withDocument($document)
    {
        $new = clone $this;
        $new->document = $document;

        return $new;
    }
}

