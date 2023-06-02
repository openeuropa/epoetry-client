<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class UpdateCallbackUrlResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
     */
    private $return;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut $return
     * @return $this
     */
    public function setReturn(\OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut $return) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlResponse
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut|null
     */
    public function getReturn() : ?\OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
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

