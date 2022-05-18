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
     * @return \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\CorrectionRequestOut $return
     * @return CreateCorrectionRequestResponse
     */
    public function withReturn($return)
    {
        $new = clone $this;
        $new->return = $return;

        return $new;
    }
}

