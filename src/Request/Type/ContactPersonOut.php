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
     * @var string
     */
    private $roleCode;

    /**
     * Constructor
     *
     * @var string $firstName
     * @var string $lastName
     * @var string $email
     * @var string $userId
     * @var string $roleCode
     */
    public function __construct(string $firstName, string $lastName, string $email, string $userId, string $roleCode)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->userId = $userId;
        $this->roleCode = $roleCode;
    }

    /**
     * @param string|null $firstName
     * @return $this
     */
    public function setFirstName(?string $firstName) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
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
     * @param string|null $lastName
     * @return $this
     */
    public function setLastName(?string $lastName) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
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
     * @param string|null $email
     * @return $this
     */
    public function setEmail(?string $email) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
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
     * @param string|null $userId
     * @return $this
     */
    public function setUserId(?string $userId) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
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
     * @param string|null $roleCode
     * @return $this
     */
    public function setRoleCode(?string $roleCode) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
    {
        $this->roleCode = $roleCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRoleCode() : ?string
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

