<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CreateCorrectionRequestResponse implements ResultInterface
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut
     */
    private $return = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut $return
     * @return $this
     */
    public function setReturn(?\OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut $return) : static
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut
     */
    public function getReturn() : ?\OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut
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

