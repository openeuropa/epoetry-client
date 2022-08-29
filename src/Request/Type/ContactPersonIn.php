<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ContactPersonIn
{
    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $contactRole;

    /**
     * Constructor
     *
     * @var string $userId
     * @var string $contactRole
     */
    public function __construct(string $userId, string $contactRole)
    {
        $this->userId = $userId;
        $this->contactRole = $contactRole;
    }

    /**
     * @param string|null $userId
     * @return $this
     */
    public function setUserId(?string $userId) : \OpenEuropa\EPoetry\Request\Type\ContactPersonIn
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
     * @param string|null $contactRole
     * @return $this
     */
    public function setContactRole(?string $contactRole) : \OpenEuropa\EPoetry\Request\Type\ContactPersonIn
    {
        $this->contactRole = $contactRole;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContactRole() : ?string
    {
        return $this->contactRole;
    }

    /**
     * @return bool
     */
    public function hasContactRole() : bool
    {
        return !empty($this->contactRole);
    }
}

