<?php

namespace OpenEuropa\EPoetry\Request\Type;

class UpdateCallbackUrlResponse
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
     */
    private $return;

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
     */
    public function getReturn()
    {
        return $this->return;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut $return
     * @return UpdateCallbackUrlResponse
     */
    public function withReturn($return)
    {
        $new = clone $this;
        $new->return = $return;

        return $new;
    }
}

