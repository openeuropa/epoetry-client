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
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return ContactPersonOut
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
     * @return ContactPersonOut
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return ContactPersonOut
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
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return ContactPersonOut
     */
    public function withUserId($userId)
    {
        $new = clone $this;
        $new->userId = $userId;

        return $new;
    }

    /**
     * @return string
     */
    public function getRoleCode()
    {
        return $this->roleCode;
    }

    /**
     * @param string $roleCode
     * @return ContactPersonOut
     */
    public function withRoleCode($roleCode)
    {
        $new = clone $this;
        $new->roleCode = $roleCode;

        return $new;
    }
}

