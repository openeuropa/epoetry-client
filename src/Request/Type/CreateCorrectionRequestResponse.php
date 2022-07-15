<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CreateCorrectionRequestResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut
     */
    private $return;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut $return
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut $return)
    {
        $this->return = $return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut $return
     * @return $this
     */
    public function setReturn(\OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut $return) : \OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequestResponse
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut
     */
    public function getReturn() : \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut
    {
        return $this->return;
    }

    /**
     * @return bool
     */
    public function hasReturn() : bool
    {
        return !empty($this->return);
    }
}

