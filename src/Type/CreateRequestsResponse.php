<?php

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CreateRequestsResponse implements ResultInterface
{

    /**
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequest
     */
    private $return;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\LinguisticRequest $return
     */
    public function __construct(\OpenEuropa\EPoetry\Type\LinguisticRequest $return)
    {
        $this->return = $return;
    }

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
    public function setReturn($return) : \OpenEuropa\EPoetry\Type\CreateRequestsResponse
    {
        $this->return = $return;
        return $this;
    }
}
