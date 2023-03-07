<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class LoginRequest
{
    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\LoginRequestSuccessType
     */
    private $loginRequestSuccess;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\LoginRequestFailureType
     */
    private $loginRequestFailure;

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
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\LoginRequestSuccessType
     */
    public function getLoginRequestSuccess()
    {
        return $this->loginRequestSuccess;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\LoginRequestSuccessType $loginRequestSuccess
     * @return LoginRequest
     */
    public function withLoginRequestSuccess($loginRequestSuccess)
    {
        $new = clone $this;
        $new->loginRequestSuccess = $loginRequestSuccess;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\LoginRequestFailureType
     */
    public function getLoginRequestFailure()
    {
        return $this->loginRequestFailure;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\LoginRequestFailureType $loginRequestFailure
     * @return LoginRequest
     */
    public function withLoginRequestFailure($loginRequestFailure)
    {
        $new = clone $this;
        $new->loginRequestFailure = $loginRequestFailure;

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
     * @return LoginRequest
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
     * @return LoginRequest
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
     * @return LoginRequest
     */
    public function withVersion($version)
    {
        $new = clone $this;
        $new->version = $version;

        return $new;
    }
}

