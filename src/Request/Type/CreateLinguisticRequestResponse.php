<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CreateLinguisticRequestResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
     */
    private $return;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut|null $return
     * @return $this
     */
    public function setReturn(?\OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut $return) : \OpenEuropa\EPoetry\Request\Type\CreateLinguisticRequestResponse
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut|null
     */
    public function getReturn() : ?\OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
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

