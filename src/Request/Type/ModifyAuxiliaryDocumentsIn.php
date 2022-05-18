<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ModifyAuxiliaryDocumentsIn
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
     * @return \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments
     */
    public function getReferenceDocuments()
    {
        return $this->referenceDocuments;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ReferenceDocuments $referenceDocuments
     * @return ModifyAuxiliaryDocumentsIn
     */
    public function withReferenceDocuments($referenceDocuments)
    {
        $new = clone $this;
        $new->referenceDocuments = $referenceDocuments;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\TraxDocuments
     */
    public function getTraxDocuments()
    {
        return $this->traxDocuments;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\TraxDocuments $traxDocuments
     * @return ModifyAuxiliaryDocumentsIn
     */
    public function withTraxDocuments($traxDocuments)
    {
        $new = clone $this;
        $new->traxDocuments = $traxDocuments;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentIn
     */
    public function getSpotDocument()
    {
        return $this->spotDocument;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DocumentIn $spotDocument
     * @return ModifyAuxiliaryDocumentsIn
     */
    public function withSpotDocument($spotDocument)
    {
        $new = clone $this;
        $new->spotDocument = $spotDocument;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\PrtDocuments
     */
    public function getPrtDocuments()
    {
        return $this->prtDocuments;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\PrtDocuments $prtDocuments
     * @return ModifyAuxiliaryDocumentsIn
     */
    public function withPrtDocuments($prtDocuments)
    {
        $new = clone $this;
        $new->prtDocuments = $prtDocuments;

        return $new;
    }
}

