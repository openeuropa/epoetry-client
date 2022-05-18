<?php

namespace OpenEuropa\EPoetry\Request\Type;

class CorrectionRequestOut
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
     */
    private $requestReference;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DcoOut
     */
    private $DCO;

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestReferenceOut $requestReference
     * @return CorrectionRequestOut
     */
    public function withRequestReference($requestReference)
    {
        $new = clone $this;
        $new->requestReference = $requestReference;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DcoOut
     */
    public function getDCO()
    {
        return $this->DCO;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DcoOut $DCO
     * @return CorrectionRequestOut
     */
    public function withDCO($DCO)
    {
        $new = clone $this;
        $new->DCO = $DCO;

        return $new;
    }
}

