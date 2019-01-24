<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class CorrectTranslation
{
    /**
     * @var \OpenEuropa\EPoetry\Type\CorrectionDocument
     */
    private $correction;

    /**
     * @var \OpenEuropa\EPoetry\Type\ProductReference
     */
    private $product;

    /**
     * @return \OpenEuropa\EPoetry\Type\CorrectionDocument
     */
    public function getCorrection(): CorrectionDocument
    {
        return $this->correction;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\ProductReference
     */
    public function getProduct(): ProductReference
    {
        return $this->product;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\CorrectionDocument $correction
     *
     * @return $this
     */
    public function setCorrection($correction): CorrectTranslation
    {
        $this->correction = $correction;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ProductReference $product
     *
     * @return $this
     */
    public function setProduct($product): CorrectTranslation
    {
        $this->product = $product;

        return $this;
    }
}
