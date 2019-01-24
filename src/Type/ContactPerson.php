<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface;

class ContactPerson implements \OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface
{
    /**
     * @var string
     */
    private $email;

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
    private $roleCode;

    /**
     * @var string
     */
    private $userId;

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getRoleCode(): string
    {
        return $this->roleCode;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $email
     *
     * @return \OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface
     */
    public function setEmail(string $email): ContactPersonInterface
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string $firstName
     *
     * @return \OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface
     */
    public function setFirstName(string $firstName): ContactPersonInterface
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return \OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface
     */
    public function setLastName(string $lastName): ContactPersonInterface
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string $roleCode
     *
     * @return \OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface
     */
    public function setRoleCode(string $roleCode): ContactPersonInterface
    {
        $this->roleCode = $roleCode;

        return $this;
    }

    /**
     * @param string $userId
     *
     * @return \OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface
     */
    public function setUserId(string $userId): ContactPersonInterface
    {
        $this->userId = $userId;

        return $this;
    }
}
