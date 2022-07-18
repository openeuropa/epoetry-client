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
     * @param string $userId
     * @return $this
     */
    public function setUserId(string $userId) : \OpenEuropa\EPoetry\Request\Type\ContactPersonIn
    {
        $this->userId = $userId;
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
     * @return bool
     */
    public function hasUserId() : bool
    {
        return !empty($this->userId);
    }

    /**
     * @param string $contactRole
     * @return $this
     */
    public function setContactRole(string $contactRole) : \OpenEuropa\EPoetry\Request\Type\ContactPersonIn
    {
        $this->contactRole = $contactRole;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactRole() : string
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

