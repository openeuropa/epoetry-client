<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ContactPersonOut
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
     * @var \OpenEuropa\EPoetry\Request\Type\ContactRole
     */
    private $roleCode;

    /**
     * Constructor
     *
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string $userId
     * @param \OpenEuropa\EPoetry\Request\Type\ContactRole $roleCode
     */
    public function __construct(string $firstName, string $lastName, string $email, string $userId, \OpenEuropa\EPoetry\Request\Type\ContactRole $roleCode)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->userId = $userId;
        $this->roleCode = $roleCode;
    }

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName) : static
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFirstName() : ?string
    {
        return $this->firstName;
    }

    /**
     * @return bool
     */
    public function hasFirstName() : bool
    {
        return !empty($this->firstName);
    }

    /**
     * @param string $lastName
     * @return $this
     */
    public function setLastName(string $lastName) : static
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLastName() : ?string
    {
        return $this->lastName;
    }

    /**
     * @return bool
     */
    public function hasLastName() : bool
    {
        return !empty($this->lastName);
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email) : static
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEmail() : ?string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function hasEmail() : bool
    {
        return !empty($this->email);
    }

    /**
     * @param string $userId
     * @return $this
     */
    public function setUserId(string $userId) : static
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUserId() : ?string
    {
        return $this->userId;
    }

    /**
     * @return bool
     */
    public function hasUserId() : bool
    {
        return !empty($this->userId);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ContactRole $roleCode
     * @return $this
     */
    public function setRoleCode(\OpenEuropa\EPoetry\Request\Type\ContactRole $roleCode) : static
    {
        $this->roleCode = $roleCode;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ContactRole|null
     */
    public function getRoleCode() : ?\OpenEuropa\EPoetry\Request\Type\ContactRole
    {
        return $this->roleCode;
    }

    /**
     * @return bool
     */
    public function hasRoleCode() : bool
    {
        return !empty($this->roleCode);
    }
}

