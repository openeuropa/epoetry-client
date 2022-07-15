<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocumentsIn
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments
     */
    private $referenceDocuments;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\TraxDocuments
     */
    private $traxDocuments;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentIn
     */
    private $spotDocument;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\PrtDocuments
     */
    private $prtDocuments;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn
     */
    private $srcDocument;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments $referenceDocuments
     * @var \OpenEuropa\EPoetry\Request\Type\TraxDocuments $traxDocuments
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentIn $spotDocument
     * @var \OpenEuropa\EPoetry\Request\Type\PrtDocuments $prtDocuments
     * @var \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn $srcDocument
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\ReferenceDocuments $referenceDocuments, \OpenEuropa\EPoetry\Request\Type\TraxDocuments $traxDocuments, \OpenEuropa\EPoetry\Request\Type\DocumentIn $spotDocument, \OpenEuropa\EPoetry\Request\Type\PrtDocuments $prtDocuments, \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn $srcDocument)
    {
        $this->referenceDocuments = $referenceDocuments;
        $this->traxDocuments = $traxDocuments;
        $this->spotDocument = $spotDocument;
        $this->prtDocuments = $prtDocuments;
        $this->srcDocument = $srcDocument;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments $referenceDocuments
     * @return $this
     */
    public function setReferenceDocuments($referenceDocuments) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
    {
        $this->referenceDocuments = $referenceDocuments;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments
     */
    public function getReferenceDocuments() : \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments
    {
        return $this->referenceDocuments;
    }

    /**
     * @return bool
     */
    public function hasReferenceDocuments() : bool
    {
        return !empty($this->referenceDocuments);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\TraxDocuments $traxDocuments
     * @return $this
     */
    public function setTraxDocuments($traxDocuments) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
    {
        $this->traxDocuments = $traxDocuments;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\TraxDocuments
     */
    public function getTraxDocuments() : \OpenEuropa\EPoetry\Request\Type\TraxDocuments
    {
        return $this->traxDocuments;
    }

    /**
     * @return bool
     */
    public function hasTraxDocuments() : bool
    {
        return !empty($this->traxDocuments);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DocumentIn $spotDocument
     * @return $this
     */
    public function setSpotDocument($spotDocument) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
    {
        $this->spotDocument = $spotDocument;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentIn
     */
    public function getSpotDocument() : \OpenEuropa\EPoetry\Request\Type\DocumentIn
    {
        return $this->spotDocument;
    }

    /**
     * @return bool
     */
    public function hasSpotDocument() : bool
    {
        return !empty($this->spotDocument);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\PrtDocuments $prtDocuments
     * @return $this
     */
    public function setPrtDocuments($prtDocuments) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
    {
        $this->prtDocuments = $prtDocuments;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\PrtDocuments
     */
    public function getPrtDocuments() : \OpenEuropa\EPoetry\Request\Type\PrtDocuments
    {
        return $this->prtDocuments;
    }

    /**
     * @return bool
     */
    public function hasPrtDocuments() : bool
    {
        return !empty($this->prtDocuments);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn $srcDocument
     * @return $this
     */
    public function setSrcDocument($srcDocument) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentsIn
    {
        $this->srcDocument = $srcDocument;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn
     */
    public function getSrcDocument() : \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn
    {
        return $this->srcDocument;
    }

    /**
     * @return bool
     */
    public function hasSrcDocument() : bool
    {
        return !empty($this->srcDocument);
    }
}

