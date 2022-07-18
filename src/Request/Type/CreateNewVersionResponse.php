<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CreateNewVersionResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
     */
    private $return;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut $return
     * @return $this
     */
    public function setReturn(\OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut $return) : \OpenEuropa\EPoetry\Request\Type\CreateNewVersionResponse
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
     */
    public function getReturn() : \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
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

