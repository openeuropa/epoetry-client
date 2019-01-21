<?php

namespace OpenEuropa\EPoetry\Type;

class ContactPerson
{

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
    private $email;

    /**
     * @var string
     */
    private $userId;

    /**
     * @var \OpenEuropa\EPoetry\Type\ContactRole
     */
    private $roleCode;

    /**
     * Constructor
     *
     * @var string $firstName
     * @var string $lastName
     * @var string $email
     * @var string $userId
     * @var \OpenEuropa\EPoetry\Type\ContactRole $roleCode
     */
    public function __construct(string $firstName, string $lastName, string $email, string $userId, \OpenEuropa\EPoetry\Type\ContactRole $roleCode)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->userId = $userId;
        $this->roleCode = $roleCode;
    }

    /**
     * @return string
     */
    public function getFirstName() : string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName) : \OpenEuropa\EPoetry\Type\ContactPerson
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName) : \OpenEuropa\EPoetry\Type\ContactPerson
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email) : \OpenEuropa\EPoetry\Type\ContactPerson
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserId() : string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return $this
     */
    public function setUserId(string $userId) : \OpenEuropa\EPoetry\Type\ContactPerson
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\ContactRole
     */
    public function getRoleCode() : \OpenEuropa\EPoetry\Type\ContactRole
    {
        return $this->roleCode;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ContactRole $roleCode
     * @return $this
     */
    public function setRoleCode($roleCode) : \OpenEuropa\EPoetry\Type\ContactPerson
    {
        $this->roleCode = $roleCode;
        return $this;
    }
}
