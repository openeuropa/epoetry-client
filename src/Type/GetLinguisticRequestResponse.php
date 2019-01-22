<?php

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GetLinguisticRequestResponse implements ResultInterface
{

    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequest
     */
    private $return;

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticRequest
     */
    public function getReturn() : \OpenEuropa\EPoetry\Type\LinguisticRequest
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequest $return
     * @return $this
     */
    public function setReturn($return) : \OpenEuropa\EPoetry\Type\GetLinguisticRequestResponse
    {
        $this->return = $return;
        return $this;
    }


}

