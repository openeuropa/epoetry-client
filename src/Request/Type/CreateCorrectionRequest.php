<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateCorrectionRequest implements RequestInterface
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
     */
    private $correctionDetails;

    /**
     * @var string
     */
    private $applicationName;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn $correctionDetails
     * @var string $applicationName
     */
    public function __construct($correctionDetails, $applicationName)
    {
        $this->correctionDetails = $correctionDetails;
        $this->applicationName = $applicationName;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
     */
    public function getCorrectionDetails()
    {
        return $this->correctionDetails;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn $correctionDetails
     * @return CreateCorrectionRequest
     */
    public function withCorrectionDetails($correctionDetails)
    {
        $new = clone $this;
        $new->correctionDetails = $correctionDetails;

        return $new;
    }

    /**
     * @return string
     */
    public function getApplicationName()
    {
        return $this->applicationName;
    }

    /**
     * @param string $applicationName
     * @return CreateCorrectionRequest
     */
    public function withApplicationName($applicationName)
    {
        $new = clone $this;
        $new->applicationName = $applicationName;

        return $new;
    }
}

