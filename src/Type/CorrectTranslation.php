<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CorrectTranslation implements RequestInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\CorrectionDocument
     */
    protected $correction;

    /**
     * @var null|\OpenEuropa\EPoetry\Type\ProductReference
     */
    protected $product;

    /**
     * @return null|\OpenEuropa\EPoetry\Type\CorrectionDocument
     */
    public function getCorrection(): ?CorrectionDocument
    {
        return $this->correction;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\ProductReference
     */
    public function getProduct(): ?ProductReference
    {
        return $this->product;
    }

    /**
     * @return bool
     */
    public function hasCorrection(): bool
    {
        return !empty($this->correction);
    }

    /**
     * @return bool
     */
    public function hasProduct(): bool
    {
        return !empty($this->product);
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
