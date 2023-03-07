<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ServiceRequest implements RequestInterface
{
    /**
     * @var string
     */
    private $service;

    /**
     * @var string
     */
    private $ticket;

    /**
     * @var bool
     */
    private $renew;

    /**
     * @var string
     */
    private $pgtUrl;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\Groups
     */
    private $groups;

    /**
     * @var bool
     */
    private $userDetails;

    /**
     * @var string
     */
    private $clientFingerprint;

    /**
     * @var string
     */
    private $sessionId;

    /**
     * @var string
     */
    private $version;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\TicketTypes
     */
    private $ticketTypes;

    /**
     * @var int
     */
    private $assuranceLevel;

    /**
     * @var string
     */
    private $proxyGrantingProtocol;

    /**
     * @var string
     */
    private $userAddress;

    /**
     * @var bool
     */
    private $singleSignOut;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AcceptStrengths
     */
    private $acceptStrengths;

    /**
     * @var string
     */
    private $authenticationLevel;

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param string $service
     * @return ServiceRequest
     */
    public function withService($service)
    {
        $new = clone $this;
        $new->service = $service;

        return $new;
    }

    /**
     * @return string
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * @param string $ticket
     * @return ServiceRequest
     */
    public function withTicket($ticket)
    {
        $new = clone $this;
        $new->ticket = $ticket;

        return $new;
    }

    /**
     * @return bool
     */
    public function getRenew()
    {
        return $this->renew;
    }

    /**
     * @param bool $renew
     * @return ServiceRequest
     */
    public function withRenew($renew)
    {
        $new = clone $this;
        $new->renew = $renew;

        return $new;
    }

    /**
     * @return string
     */
    public function getPgtUrl()
    {
        return $this->pgtUrl;
    }

    /**
     * @param string $pgtUrl
     * @return ServiceRequest
     */
    public function withPgtUrl($pgtUrl)
    {
        $new = clone $this;
        $new->pgtUrl = $pgtUrl;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\Groups
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\Groups $groups
     * @return ServiceRequest
     */
    public function withGroups($groups)
    {
        $new = clone $this;
        $new->groups = $groups;

        return $new;
    }

    /**
     * @return bool
     */
    public function getUserDetails()
    {
        return $this->userDetails;
    }

    /**
     * @param bool $userDetails
     * @return ServiceRequest
     */
    public function withUserDetails($userDetails)
    {
        $new = clone $this;
        $new->userDetails = $userDetails;

        return $new;
    }

    /**
     * @return string
     */
    public function getClientFingerprint()
    {
        return $this->clientFingerprint;
    }

    /**
     * @param string $clientFingerprint
     * @return ServiceRequest
     */
    public function withClientFingerprint($clientFingerprint)
    {
        $new = clone $this;
        $new->clientFingerprint = $clientFingerprint;

        return $new;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     * @return ServiceRequest
     */
    public function withSessionId($sessionId)
    {
        $new = clone $this;
        $new->sessionId = $sessionId;

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
     * @return ServiceRequest
     */
    public function withVersion($version)
    {
        $new = clone $this;
        $new->version = $version;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\TicketTypes
     */
    public function getTicketTypes()
    {
        return $this->ticketTypes;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\TicketTypes $ticketTypes
     * @return ServiceRequest
     */
    public function withTicketTypes($ticketTypes)
    {
        $new = clone $this;
        $new->ticketTypes = $ticketTypes;

        return $new;
    }

    /**
     * @return int
     */
    public function getAssuranceLevel()
    {
        return $this->assuranceLevel;
    }

    /**
     * @param int $assuranceLevel
     * @return ServiceRequest
     */
    public function withAssuranceLevel($assuranceLevel)
    {
        $new = clone $this;
        $new->assuranceLevel = $assuranceLevel;

        return $new;
    }

    /**
     * @return string
     */
    public function getProxyGrantingProtocol()
    {
        return $this->proxyGrantingProtocol;
    }

    /**
     * @param string $proxyGrantingProtocol
     * @return ServiceRequest
     */
    public function withProxyGrantingProtocol($proxyGrantingProtocol)
    {
        $new = clone $this;
        $new->proxyGrantingProtocol = $proxyGrantingProtocol;

        return $new;
    }

    /**
     * @return string
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * @param string $userAddress
     * @return ServiceRequest
     */
    public function withUserAddress($userAddress)
    {
        $new = clone $this;
        $new->userAddress = $userAddress;

        return $new;
    }

    /**
     * @return bool
     */
    public function getSingleSignOut()
    {
        return $this->singleSignOut;
    }

    /**
     * @param bool $singleSignOut
     * @return ServiceRequest
     */
    public function withSingleSignOut($singleSignOut)
    {
        $new = clone $this;
        $new->singleSignOut = $singleSignOut;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AcceptStrengths
     */
    public function getAcceptStrengths()
    {
        return $this->acceptStrengths;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\EuLogin\Type\AcceptStrengths $acceptStrengths
     * @return ServiceRequest
     */
    public function withAcceptStrengths($acceptStrengths)
    {
        $new = clone $this;
        $new->acceptStrengths = $acceptStrengths;

        return $new;
    }

    /**
     * @return string
     */
    public function getAuthenticationLevel()
    {
        return $this->authenticationLevel;
    }

    /**
     * @param string $authenticationLevel
     * @return ServiceRequest
     */
    public function withAuthenticationLevel($authenticationLevel)
    {
        $new = clone $this;
        $new->authenticationLevel = $authenticationLevel;

        return $new;
    }
}

