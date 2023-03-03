<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class AuthenticationSuccessType
{
    /**
     * @var string
     */
    private $user;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\RegistrationLevelVersion
     */
    private $registrationLevelVersion;

    /**
     * @var string
     */
    private $departmentNumber;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $employeeNumber;

    /**
     * @var string
     */
    private $employeeType;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $domainUsername;

    /**
     * @var string
     */
    private $telephoneNumber;

    /**
     * @var string
     */
    private $userManager;

    /**
     * @var string
     */
    private $timeZone;

    /**
     * @var string
     */
    private $locale;

    /**
     * @var int
     */
    private $assuranceLevel;

    /**
     * @var string
     */
    private $uid;

    /**
     * @var string
     */
    private $orgId;

    /**
     * @var bool
     */
    private $teleworkingPriority;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\ExtendedAttributes
     */
    private $extendedAttributes;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\Groups
     */
    private $groups;

    /**
     * @var string
     */
    private $authenticationLevel;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\Strengths
     */
    private $strengths;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\AuthenticationFactors
     */
    private $authenticationFactors;

    /**
     * @var \DateTimeInterface
     */
    private $loginDate;

    /**
     * @var bool
     */
    private $sso;

    /**
     * @var string
     */
    private $ticketType;

    /**
     * @var string
     */
    private $proxyGrantingProtocol;

    /**
     * @var string
     */
    private $proxyGrantingTicket;

    /**
     * @var \OpenEuropa\EPoetry\TicketValidation\Type\Proxies
     */
    private $proxies;

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return AuthenticationSuccessType
     */
    public function withUser($user)
    {
        $new = clone $this;
        $new->user = $user;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\RegistrationLevelVersion
     */
    public function getRegistrationLevelVersion()
    {
        return $this->registrationLevelVersion;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\RegistrationLevelVersion $registrationLevelVersion
     * @return AuthenticationSuccessType
     */
    public function withRegistrationLevelVersion($registrationLevelVersion)
    {
        $new = clone $this;
        $new->registrationLevelVersion = $registrationLevelVersion;

        return $new;
    }

    /**
     * @return string
     */
    public function getDepartmentNumber()
    {
        return $this->departmentNumber;
    }

    /**
     * @param string $departmentNumber
     * @return AuthenticationSuccessType
     */
    public function withDepartmentNumber($departmentNumber)
    {
        $new = clone $this;
        $new->departmentNumber = $departmentNumber;

        return $new;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return AuthenticationSuccessType
     */
    public function withEmail($email)
    {
        $new = clone $this;
        $new->email = $email;

        return $new;
    }

    /**
     * @return string
     */
    public function getEmployeeNumber()
    {
        return $this->employeeNumber;
    }

    /**
     * @param string $employeeNumber
     * @return AuthenticationSuccessType
     */
    public function withEmployeeNumber($employeeNumber)
    {
        $new = clone $this;
        $new->employeeNumber = $employeeNumber;

        return $new;
    }

    /**
     * @return string
     */
    public function getEmployeeType()
    {
        return $this->employeeType;
    }

    /**
     * @param string $employeeType
     * @return AuthenticationSuccessType
     */
    public function withEmployeeType($employeeType)
    {
        $new = clone $this;
        $new->employeeType = $employeeType;

        return $new;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return AuthenticationSuccessType
     */
    public function withFirstName($firstName)
    {
        $new = clone $this;
        $new->firstName = $firstName;

        return $new;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return AuthenticationSuccessType
     */
    public function withLastName($lastName)
    {
        $new = clone $this;
        $new->lastName = $lastName;

        return $new;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     * @return AuthenticationSuccessType
     */
    public function withDomain($domain)
    {
        $new = clone $this;
        $new->domain = $domain;

        return $new;
    }

    /**
     * @return string
     */
    public function getDomainUsername()
    {
        return $this->domainUsername;
    }

    /**
     * @param string $domainUsername
     * @return AuthenticationSuccessType
     */
    public function withDomainUsername($domainUsername)
    {
        $new = clone $this;
        $new->domainUsername = $domainUsername;

        return $new;
    }

    /**
     * @return string
     */
    public function getTelephoneNumber()
    {
        return $this->telephoneNumber;
    }

    /**
     * @param string $telephoneNumber
     * @return AuthenticationSuccessType
     */
    public function withTelephoneNumber($telephoneNumber)
    {
        $new = clone $this;
        $new->telephoneNumber = $telephoneNumber;

        return $new;
    }

    /**
     * @return string
     */
    public function getUserManager()
    {
        return $this->userManager;
    }

    /**
     * @param string $userManager
     * @return AuthenticationSuccessType
     */
    public function withUserManager($userManager)
    {
        $new = clone $this;
        $new->userManager = $userManager;

        return $new;
    }

    /**
     * @return string
     */
    public function getTimeZone()
    {
        return $this->timeZone;
    }

    /**
     * @param string $timeZone
     * @return AuthenticationSuccessType
     */
    public function withTimeZone($timeZone)
    {
        $new = clone $this;
        $new->timeZone = $timeZone;

        return $new;
    }

    /**
     * @return string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $locale
     * @return AuthenticationSuccessType
     */
    public function withLocale($locale)
    {
        $new = clone $this;
        $new->locale = $locale;

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
     * @return AuthenticationSuccessType
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
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return AuthenticationSuccessType
     */
    public function withUid($uid)
    {
        $new = clone $this;
        $new->uid = $uid;

        return $new;
    }

    /**
     * @return string
     */
    public function getOrgId()
    {
        return $this->orgId;
    }

    /**
     * @param string $orgId
     * @return AuthenticationSuccessType
     */
    public function withOrgId($orgId)
    {
        $new = clone $this;
        $new->orgId = $orgId;

        return $new;
    }

    /**
     * @return bool
     */
    public function getTeleworkingPriority()
    {
        return $this->teleworkingPriority;
    }

    /**
     * @param bool $teleworkingPriority
     * @return AuthenticationSuccessType
     */
    public function withTeleworkingPriority($teleworkingPriority)
    {
        $new = clone $this;
        $new->teleworkingPriority = $teleworkingPriority;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\ExtendedAttributes
     */
    public function getExtendedAttributes()
    {
        return $this->extendedAttributes;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\ExtendedAttributes $extendedAttributes
     * @return AuthenticationSuccessType
     */
    public function withExtendedAttributes($extendedAttributes)
    {
        $new = clone $this;
        $new->extendedAttributes = $extendedAttributes;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\Groups
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\Groups $groups
     * @return AuthenticationSuccessType
     */
    public function withGroups($groups)
    {
        $new = clone $this;
        $new->groups = $groups;

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
     * @return AuthenticationSuccessType
     */
    public function withAuthenticationLevel($authenticationLevel)
    {
        $new = clone $this;
        $new->authenticationLevel = $authenticationLevel;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\Strengths
     */
    public function getStrengths()
    {
        return $this->strengths;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\Strengths $strengths
     * @return AuthenticationSuccessType
     */
    public function withStrengths($strengths)
    {
        $new = clone $this;
        $new->strengths = $strengths;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\AuthenticationFactors
     */
    public function getAuthenticationFactors()
    {
        return $this->authenticationFactors;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\AuthenticationFactors $authenticationFactors
     * @return AuthenticationSuccessType
     */
    public function withAuthenticationFactors($authenticationFactors)
    {
        $new = clone $this;
        $new->authenticationFactors = $authenticationFactors;

        return $new;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getLoginDate()
    {
        return $this->loginDate;
    }

    /**
     * @param \DateTimeInterface $loginDate
     * @return AuthenticationSuccessType
     */
    public function withLoginDate($loginDate)
    {
        $new = clone $this;
        $new->loginDate = $loginDate;

        return $new;
    }

    /**
     * @return bool
     */
    public function getSso()
    {
        return $this->sso;
    }

    /**
     * @param bool $sso
     * @return AuthenticationSuccessType
     */
    public function withSso($sso)
    {
        $new = clone $this;
        $new->sso = $sso;

        return $new;
    }

    /**
     * @return string
     */
    public function getTicketType()
    {
        return $this->ticketType;
    }

    /**
     * @param string $ticketType
     * @return AuthenticationSuccessType
     */
    public function withTicketType($ticketType)
    {
        $new = clone $this;
        $new->ticketType = $ticketType;

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
     * @return AuthenticationSuccessType
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
    public function getProxyGrantingTicket()
    {
        return $this->proxyGrantingTicket;
    }

    /**
     * @param string $proxyGrantingTicket
     * @return AuthenticationSuccessType
     */
    public function withProxyGrantingTicket($proxyGrantingTicket)
    {
        $new = clone $this;
        $new->proxyGrantingTicket = $proxyGrantingTicket;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\TicketValidation\Type\Proxies
     */
    public function getProxies()
    {
        return $this->proxies;
    }

    /**
     * @param \OpenEuropa\EPoetry\TicketValidation\Type\Proxies $proxies
     * @return AuthenticationSuccessType
     */
    public function withProxies($proxies)
    {
        $new = clone $this;
        $new->proxies = $proxies;

        return $new;
    }
}

