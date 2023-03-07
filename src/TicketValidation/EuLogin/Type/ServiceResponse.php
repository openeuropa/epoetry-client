<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

use Phpro\SoapClient\Type\ResultInterface;

class ServiceResponse implements ResultInterface
{
    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AuthenticationSuccessType
     */
    private $authenticationSuccess;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AuthenticationFailureType
     */
    private $authenticationFailure;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\ProxySuccessType
     */
    private $proxySuccess;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\ProxyFailureType
     */
    private $proxyFailure;

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
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AuthenticationSuccessType
     */
    public function getAuthenticationSuccess()
    {
        return $this->authenticationSuccess;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AuthenticationSuccessType $authenticationSuccess
     * @return ServiceResponse
     */
    public function withAuthenticationSuccess($authenticationSuccess)
    {
        $new = clone $this;
        $new->authenticationSuccess = $authenticationSuccess;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AuthenticationFailureType
     */
    public function getAuthenticationFailure()
    {
        return $this->authenticationFailure;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AuthenticationFailureType $authenticationFailure
     * @return ServiceResponse
     */
    public function withAuthenticationFailure($authenticationFailure)
    {
        $new = clone $this;
        $new->authenticationFailure = $authenticationFailure;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\ProxySuccessType
     */
    public function getProxySuccess()
    {
        return $this->proxySuccess;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\ProxySuccessType $proxySuccess
     * @return ServiceResponse
     */
    public function withProxySuccess($proxySuccess)
    {
        $new = clone $this;
        $new->proxySuccess = $proxySuccess;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\ProxyFailureType
     */
    public function getProxyFailure()
    {
        return $this->proxyFailure;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\ProxyFailureType $proxyFailure
     * @return ServiceResponse
     */
    public function withProxyFailure($proxyFailure)
    {
        $new = clone $this;
        $new->proxyFailure = $proxyFailure;

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
     * @return ServiceResponse
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
     * @return ServiceResponse
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
     * @return ServiceResponse
     */
    public function withVersion($version)
    {
        $new = clone $this;
        $new->version = $version;

        return $new;
    }
}

