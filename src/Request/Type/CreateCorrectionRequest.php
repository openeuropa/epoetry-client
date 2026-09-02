<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class CreateCorrectionRequest implements RequestInterface
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
     */
    private $correctionDetails = null;

    /**
     * @var null | string
     */
    private $applicationName = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn $correctionDetails
     * @return $this
     */
    public function setCorrectionDetails(?\OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn $correctionDetails): static
    {
        $this->correctionDetails = $correctionDetails;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
     */
    public function getCorrectionDetails(): ?\OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
    {
        return $this->correctionDetails;
    }

    /**
     * @return bool
     */
    public function hasCorrectionDetails(): bool
    {
        return !empty($this->correctionDetails);
    }

    /**
     * @param null | string $applicationName
     * @return $this
     */
    public function setApplicationName(?string $applicationName): static
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getApplicationName(): ?string
    {
        return $this->applicationName;
    }

    /**
     * @return bool
     */
    public function hasApplicationName(): bool
    {
        return !empty($this->applicationName);
    }
}

