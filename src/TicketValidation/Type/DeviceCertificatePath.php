<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class DeviceCertificatePath
{
    /**
     * @var string
     */
    private $deviceCertificate;

    /**
     * @return string
     */
    public function getDeviceCertificate()
    {
        return $this->deviceCertificate;
    }

    /**
     * @param string $deviceCertificate
     * @return DeviceCertificatePath
     */
    public function withDeviceCertificate($deviceCertificate)
    {
        $new = clone $this;
        $new->deviceCertificate = $deviceCertificate;

        return $new;
    }
}

