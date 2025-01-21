<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ContactPersonIn
{
    /**
     * @var string
     */
    private $userId;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ContactRole
     */
    private $contactRole;

    /**
     * Constructor
     *
     * @param string $userId
     * @param \OpenEuropa\EPoetry\Request\Type\ContactRole $contactRole
     */
    public function __construct(string $userId, \OpenEuropa\EPoetry\Request\Type\ContactRole $contactRole)
    {
        $this->userId = $userId;
        $this->contactRole = $contactRole;
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
     * @param \OpenEuropa\EPoetry\Request\Type\ContactRole $contactRole
     * @return $this
     */
    public function setContactRole(\OpenEuropa\EPoetry\Request\Type\ContactRole $contactRole) : static
    {
        $this->contactRole = $contactRole;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ContactRole|null
     */
    public function getContactRole() : ?\OpenEuropa\EPoetry\Request\Type\ContactRole
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

