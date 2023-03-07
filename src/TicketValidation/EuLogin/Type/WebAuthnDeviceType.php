<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class WebAuthnDeviceType
{
    /**
     * @var string
     */
    private $deviceName;

    /**
     * @var string
     */
    private $deviceIdentifier;

    /**
     * @var string
     */
    private $deviceType;

    /**
     * @var string
     */
    private $deviceAaguid;

    /**
     * @var string
     */
    private $deviceManufacturer;

    /**
     * @var string
     */
    private $deviceModel;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\DeviceCertificatePath
     */
    private $deviceCertificatePath;

    /**
     * @return string
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * @param string $deviceName
     * @return WebAuthnDeviceType
     */
    public function withDeviceName($deviceName)
    {
        $new = clone $this;
        $new->deviceName = $deviceName;

        return $new;
    }

    /**
     * @return string
     */
    public function getDeviceIdentifier()
    {
        return $this->deviceIdentifier;
    }

    /**
     * @param string $deviceIdentifier
     * @return WebAuthnDeviceType
     */
    public function withDeviceIdentifier($deviceIdentifier)
    {
        $new = clone $this;
        $new->deviceIdentifier = $deviceIdentifier;

        return $new;
    }

    /**
     * @return string
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * @param string $deviceType
     * @return WebAuthnDeviceType
     */
    public function withDeviceType($deviceType)
    {
        $new = clone $this;
        $new->deviceType = $deviceType;

        return $new;
    }

    /**
     * @return string
     */
    public function getDeviceAaguid()
    {
        return $this->deviceAaguid;
    }

    /**
     * @param string $deviceAaguid
     * @return WebAuthnDeviceType
     */
    public function withDeviceAaguid($deviceAaguid)
    {
        $new = clone $this;
        $new->deviceAaguid = $deviceAaguid;

        return $new;
    }

    /**
     * @return string
     */
    public function getDeviceManufacturer()
    {
        return $this->deviceManufacturer;
    }

    /**
     * @param string $deviceManufacturer
     * @return WebAuthnDeviceType
     */
    public function withDeviceManufacturer($deviceManufacturer)
    {
        $new = clone $this;
        $new->deviceManufacturer = $deviceManufacturer;

        return $new;
    }

    /**
     * @return string
     */
    public function getDeviceModel()
    {
        return $this->deviceModel;
    }

    /**
     * @param string $deviceModel
     * @return WebAuthnDeviceType
     */
    public function withDeviceModel($deviceModel)
    {
        $new = clone $this;
        $new->deviceModel = $deviceModel;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\DeviceCertificatePath
     */
    public function getDeviceCertificatePath()
    {
        return $this->deviceCertificatePath;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\DeviceCertificatePath $deviceCertificatePath
     * @return WebAuthnDeviceType
     */
    public function withDeviceCertificatePath($deviceCertificatePath)
    {
        $new = clone $this;
        $new->deviceCertificatePath = $deviceCertificatePath;

        return $new;
    }
}

