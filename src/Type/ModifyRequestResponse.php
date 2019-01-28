<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ModifyRequestResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequest
     */
    protected $return;

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticRequest
     */
    public function getReturn(): LinguisticRequest
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequest $return
     *
     * @return $this
     */
    public function setReturn($return): ModifyRequestResponse
    {
        $this->return = $return;

        return $this;
    }
}
