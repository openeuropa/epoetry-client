<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class UserConfirmationSignature
{
    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\SignatureFailureType
     */
    private $signatureFailure;

    /**
     * @var string
     */
    private $server;

    /**
     * @var \DateTimeInterface
     */
    private $date;

    /**
     * @var string
     */
    private $version;

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\SignatureFailureType
     */
    public function getSignatureFailure()
    {
        return $this->signatureFailure;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\SignatureFailureType $signatureFailure
     * @return UserConfirmationSignature
     */
    public function withSignatureFailure($signatureFailure)
    {
        $new = clone $this;
        $new->signatureFailure = $signatureFailure;

        return $new;
    }

    /**
     * @return string
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param string $server
     * @return UserConfirmationSignature
     */
    public function withServer($server)
    {
        $new = clone $this;
        $new->server = $server;

        return $new;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     * @return UserConfirmationSignature
     */
    public function withDate($date)
    {
        $new = clone $this;
        $new->date = $date;

        return $new;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return UserConfirmationSignature
     */
    public function withVersion($version)
    {
        $new = clone $this;
        $new->version = $version;

        return $new;
    }
}

