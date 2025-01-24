<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class UpdateCallbackUrlResponse implements ResultInterface
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
     */
    private $return = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut $return
     * @return $this
     */
    public function setReturn(?\OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut $return) : static
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
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

