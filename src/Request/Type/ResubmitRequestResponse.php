<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ResubmitRequestResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
     */
    private $return;

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticRequestOut $return
     * @return ResubmitRequestResponse
     */
    public function withReturn($return)
    {
        $new = clone $this;
        $new->return = $return;

        return $new;
    }
}

