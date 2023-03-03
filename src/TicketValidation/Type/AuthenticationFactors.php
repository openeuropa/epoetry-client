<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class AuthenticationFactors
{
    /**
     * @var string
     */
    private $mobilePhoneNumber;

    /**
     * @var string
     */
    private $moniker;

    /**
     * @var string
     */
    private $storkId;

    /**
     * @var string
     */
    private $eidasId;

    /**
     * @var string
     */
    private $tokenCramId;

    /**
     * @var string
     */
    private $tokenId;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\MobileDeviceType
     */
    private $mobileDevice;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\WebAuthnDeviceType
     */
    private $webAuthnDevice;

    /**
     * @var int
     */
    private $number;

    /**
     * @return string
     */
    public function getMobilePhoneNumber()
    {
        return $this->mobilePhoneNumber;
    }

    /**
     * @param string $mobilePhoneNumber
     * @return AuthenticationFactors
     */
    public function withMobilePhoneNumber($mobilePhoneNumber)
    {
        $new = clone $this;
        $new->mobilePhoneNumber = $mobilePhoneNumber;

        return $new;
    }

    /**
     * @return string
     */
    public function getMoniker()
    {
        return $this->moniker;
    }

    /**
     * @param string $moniker
     * @return AuthenticationFactors
     */
    public function withMoniker($moniker)
    {
        $new = clone $this;
        $new->moniker = $moniker;

        return $new;
    }

    /**
     * @return string
     */
    public function getStorkId()
    {
        return $this->storkId;
    }

    /**
     * @param string $storkId
     * @return AuthenticationFactors
     */
    public function withStorkId($storkId)
    {
        $new = clone $this;
        $new->storkId = $storkId;

        return $new;
    }

    /**
     * @return string
     */
    public function getEidasId()
    {
        return $this->eidasId;
    }

    /**
     * @param string $eidasId
     * @return AuthenticationFactors
     */
    public function withEidasId($eidasId)
    {
        $new = clone $this;
        $new->eidasId = $eidasId;

        return $new;
    }

    /**
     * @return string
     */
    public function getTokenCramId()
    {
        return $this->tokenCramId;
    }

    /**
     * @param string $tokenCramId
     * @return AuthenticationFactors
     */
    public function withTokenCramId($tokenCramId)
    {
        $new = clone $this;
        $new->tokenCramId = $tokenCramId;

        return $new;
    }

    /**
     * @return string
     */
    public function getTokenId()
    {
        return $this->tokenId;
    }

    /**
     * @param string $tokenId
     * @return AuthenticationFactors
     */
    public function withTokenId($tokenId)
    {
        $new = clone $this;
        $new->tokenId = $tokenId;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\MobileDeviceType
     */
    public function getMobileDevice()
    {
        return $this->mobileDevice;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\MobileDeviceType $mobileDevice
     * @return AuthenticationFactors
     */
    public function withMobileDevice($mobileDevice)
    {
        $new = clone $this;
        $new->mobileDevice = $mobileDevice;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\WebAuthnDeviceType
     */
    public function getWebAuthnDevice()
    {
        return $this->webAuthnDevice;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\WebAuthnDeviceType $webAuthnDevice
     * @return AuthenticationFactors
     */
    public function withWebAuthnDevice($webAuthnDevice)
    {
        $new = clone $this;
        $new->webAuthnDevice = $webAuthnDevice;

        return $new;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return AuthenticationFactors
     */
    public function withNumber($number)
    {
        $new = clone $this;
        $new->number = $number;

        return $new;
    }
}

