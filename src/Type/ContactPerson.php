<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class ContactPerson
{
    /**
     * @var null|string
     */
    protected $email;

    /**
     * @var null|string
     */
    protected $firstName;

    /**
     * @var null|string
     */
    protected $lastName;

    /**
     * @var null|string
     */
    protected $roleCode;

    /**
     * @var null|string
     */
    protected $userId;

    /**
     * @return null|string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return null|string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return null|string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return null|string
     */
    public function getRoleCode(): ?string
    {
        return $this->roleCode;
    }

    /**
     * @return null|string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @return bool
     */
    public function hasEmail(): bool
    {
        if (\is_array($this->email)) {
            return !empty($this->email);
        }

        return isset($this->email);
    }

    /**
     * @return bool
     */
    public function hasFirstName(): bool
    {
        if (\is_array($this->firstName)) {
            return !empty($this->firstName);
        }

        return isset($this->firstName);
    }

    /**
     * @return bool
     */
    public function hasLastName(): bool
    {
        if (\is_array($this->lastName)) {
            return !empty($this->lastName);
        }

        return isset($this->lastName);
    }

    /**
     * @return bool
     */
    public function hasRoleCode(): bool
    {
        if (\is_array($this->roleCode)) {
            return !empty($this->roleCode);
        }

        return isset($this->roleCode);
    }

    /**
     * @return bool
     */
    public function hasUserId(): bool
    {
        if (\is_array($this->userId)) {
            return !empty($this->userId);
        }

        return isset($this->userId);
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail(string $email): ContactPerson
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @param string $firstName
     *
     * @return $this
     */
    public function setFirstName(string $firstName): ContactPerson
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @param string $lastName
     *
     * @return $this
     */
    public function setLastName(string $lastName): ContactPerson
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @param string $roleCode
     *
     * @return $this
     */
    public function setRoleCode(string $roleCode): ContactPerson
    {
        $this->roleCode = $roleCode;

        return $this;
    }

    /**
     * @param string $userId
     *
     * @return $this
     */
    public function setUserId(string $userId): ContactPerson
    {
        $this->userId = $userId;

        return $this;
    }
}
