<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class MobileDeviceType
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
    private $mobileOs;

    /**
     * @var string
     */
    private $deviceManufacturer;

    /**
     * @var string
     */
    private $deviceModel;

    /**
     * @return string
     */
    public function getDeviceName()
    {
        return $this->deviceName;
    }

    /**
     * @param string $deviceName
     * @return MobileDeviceType
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
     * @return MobileDeviceType
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
    public function getMobileOs()
    {
        return $this->mobileOs;
    }

    /**
     * @param string $mobileOs
     * @return MobileDeviceType
     */
    public function withMobileOs($mobileOs)
    {
        $new = clone $this;
        $new->mobileOs = $mobileOs;

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
     * @return MobileDeviceType
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
     * @return MobileDeviceType
     */
    public function withDeviceModel($deviceModel)
    {
        $new = clone $this;
        $new->deviceModel = $deviceModel;

        return $new;
    }
}

