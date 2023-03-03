<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class MessageAuthenticationSignature
{
    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\MessageAuthenticationFailureType
     */
    private $messageAuthenticationFailure;

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
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\MessageAuthenticationFailureType
     */
    public function getMessageAuthenticationFailure()
    {
        return $this->messageAuthenticationFailure;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\MessageAuthenticationFailureType $messageAuthenticationFailure
     * @return MessageAuthenticationSignature
     */
    public function withMessageAuthenticationFailure($messageAuthenticationFailure)
    {
        $new = clone $this;
        $new->messageAuthenticationFailure = $messageAuthenticationFailure;

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
     * @return MessageAuthenticationSignature
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
     * @return MessageAuthenticationSignature
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
     * @return MessageAuthenticationSignature
     */
    public function withVersion($version)
    {
        $new = clone $this;
        $new->version = $version;

        return $new;
    }
}

