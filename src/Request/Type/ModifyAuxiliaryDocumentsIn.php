<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ModifyAuxiliaryDocumentsIn
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\ReferenceDocuments
     */
    private $referenceDocuments;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\TraxDocuments
     */
    private $traxDocuments;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\DocumentIn
     */
    private $spotDocument;

    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\PrtDocuments
     */
    private $prtDocuments;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments $referenceDocuments
     * @return $this
     */
    public function setReferenceDocuments($referenceDocuments) : \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
    {
        $this->referenceDocuments = $referenceDocuments;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments|null
     */
    public function getReferenceDocuments() : ?\OpenEuropa\EPoetry\Request\Type\ReferenceDocuments
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
    public function setTraxDocuments($traxDocuments) : \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
    {
        $this->traxDocuments = $traxDocuments;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\TraxDocuments|null
     */
    public function getTraxDocuments() : ?\OpenEuropa\EPoetry\Request\Type\TraxDocuments
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
    public function setSpotDocument($spotDocument) : \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
    {
        $this->spotDocument = $spotDocument;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentIn|null
     */
    public function getSpotDocument() : ?\OpenEuropa\EPoetry\Request\Type\DocumentIn
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
    public function setPrtDocuments($prtDocuments) : \OpenEuropa\EPoetry\Request\Type\ModifyAuxiliaryDocumentsIn
    {
        $this->prtDocuments = $prtDocuments;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\PrtDocuments|null
     */
    public function getPrtDocuments() : ?\OpenEuropa\EPoetry\Request\Type\PrtDocuments
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
}

