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
    public function __construct(\OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn $correctionDetails, string $applicationName)
    {
        $this->correctionDetails = $correctionDetails;
        $this->applicationName = $applicationName;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn $correctionDetails
     * @return $this
     */
    public function setCorrectionDetails(\OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn $correctionDetails) : \OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequest
    {
        $this->correctionDetails = $correctionDetails;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
     */
    public function getCorrectionDetails() : \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
    {
        return $this->correctionDetails;
    }

    /**
     * @return bool
     */
    public function hasCorrectionDetails() : bool
    {
        return !empty($this->correctionDetails);
    }

    /**
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName) : \OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequest
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationName() : string
    {
        return $this->applicationName;
    }

    /**
     * @return bool
     */
    public function hasApplicationName() : bool
    {
        return !empty($this->applicationName);
    }
}

