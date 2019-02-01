<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class FindLinguisticRequestResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequest
     */
    protected $return;

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticRequest
     */
    public function getReturn(): ?\OpenEuropa\EPoetry\Type\LinguisticRequest
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequest $return
     *
     * @return $this
     */
    public function setReturn($return): FindLinguisticRequestResponse
    {
        $this->return = $return;

        return $this;
    }
}
