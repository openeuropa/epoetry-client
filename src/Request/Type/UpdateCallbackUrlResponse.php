<?php

namespace OpenEuropa\EPoetry\Request\Type;

class UpdateCallbackUrlResponse
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
     */
    private $return;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut $return
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut $return)
    {
        $this->return = $return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut $return
     * @return $this
     */
    public function setReturn($return) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlResponse
    {
        $this->return = $return;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
     */
    public function getReturn() : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
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

