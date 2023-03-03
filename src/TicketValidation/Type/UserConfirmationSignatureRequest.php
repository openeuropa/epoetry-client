<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class UserConfirmationSignatureRequest
{
    /**
     * @var string
     */
    private $signatureRequestId;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\SignatureRequestFailureType
     */
    private $signatureRequestFailure;

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
     * @return string
     */
    public function getSignatureRequestId()
    {
        return $this->signatureRequestId;
    }

    /**
     * @param string $signatureRequestId
     * @return UserConfirmationSignatureRequest
     */
    public function withSignatureRequestId($signatureRequestId)
    {
        $new = clone $this;
        $new->signatureRequestId = $signatureRequestId;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\SignatureRequestFailureType
     */
    public function getSignatureRequestFailure()
    {
        return $this->signatureRequestFailure;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\SignatureRequestFailureType $signatureRequestFailure
     * @return UserConfirmationSignatureRequest
     */
    public function withSignatureRequestFailure($signatureRequestFailure)
    {
        $new = clone $this;
        $new->signatureRequestFailure = $signatureRequestFailure;

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
     * @return UserConfirmationSignatureRequest
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
     * @return UserConfirmationSignatureRequest
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
     * @return UserConfirmationSignatureRequest
     */
    public function withVersion($version)
    {
        $new = clone $this;
        $new->version = $version;

        return $new;
    }
}

