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
     * @var string
     */
    private $roleCode;

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
     * @return string
     */
    public function getRoleCode() : string
    {
        return $this->roleCode;
    }

    /**
     * @param string $roleCode
     * @return $this
     */
    public function setRoleCode(string $roleCode) : \OpenEuropa\EPoetry\Type\ContactPerson
    {
        $this->roleCode = $roleCode;
        return $this;
    }
}
