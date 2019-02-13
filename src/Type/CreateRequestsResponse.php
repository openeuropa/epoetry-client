<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CreateRequestsResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequest[]
     */
    protected $return = [];

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequest $return
     *
     * @return $this
     */
    public function addReturn($return): CreateRequestsResponse
    {
        $this->return[] = $return;

        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\LinguisticRequest[]
     */
    public function getReturn(): array
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequest $return
     *
     * @return $this
     */
    public function setReturn($return): CreateRequestsResponse
    {
        $this->return = $return;

        return $this;
    }
}
