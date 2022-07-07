<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateCorrectionRequest implements RequestInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
     */
    private $correctionDetails;

    /**
     * @var null|string
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
     * @param \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn $correctionDetails
     * @return $this
     */
    public function setCorrectionDetails($correctionDetails) : \OpenEuropa\EPoetry\Request\Type\CreateCorrectionRequest
    {
        $this->correctionDetails = $correctionDetails;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn|null
     */
    public function getCorrectionDetails() : ?\OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
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
     * @return string|null
     */
    public function getApplicationName() : ?string
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

