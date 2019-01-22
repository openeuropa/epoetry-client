<?php

namespace OpenEuropa\EPoetry\Type;

class CorrectTranslation
{

    /**
     * @var \OpenEuropa\EPoetry\Type\ProductReference
     */
    private $product;

    /**
     * @var \OpenEuropa\EPoetry\Type\CorrectionDocument
     */
    private $correction;

    /**
     * @return \OpenEuropa\EPoetry\Type\ProductReference
     */
    public function getProduct() : \OpenEuropa\EPoetry\Type\ProductReference
    {
        return $this->product;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ProductReference $product
     * @return $this
     */
    public function setProduct($product) : \OpenEuropa\EPoetry\Type\CorrectTranslation
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\CorrectionDocument
     */
    public function getCorrection() : \OpenEuropa\EPoetry\Type\CorrectionDocument
    {
        return $this->correction;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\CorrectionDocument $correction
     * @return $this
     */
    public function setCorrection($correction) : \OpenEuropa\EPoetry\Type\CorrectTranslation
    {
        $this->correction = $correction;
        return $this;
    }


}

