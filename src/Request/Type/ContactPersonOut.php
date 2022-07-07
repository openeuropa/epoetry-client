<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ContactPersonOut
{
    /**
     * @var null|string
     */
    private $firstName;

    /**
     * @var null|string
     */
    private $lastName;

    /**
     * @var null|string
     */
    private $email;

    /**
     * @var null|string
     */
    private $userId;

    /**
     * @var null|string
     */
    private $roleCode;

    /**
     * @param string $firstName
     * @return $this
     */
    public function setFirstName(string $firstName) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
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
    public function setLastName(string $lastName) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
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
    public function setEmail(string $email) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
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
    public function setUserId(string $userId) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
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
     * @param string $roleCode
     * @return $this
     */
    public function setRoleCode(string $roleCode) : \OpenEuropa\EPoetry\Request\Type\ContactPersonOut
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

