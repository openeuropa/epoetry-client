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
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return ContactPersonIn
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
    public function getContactRole()
    {
        return $this->contactRole;
    }

    /**
     * @param string $contactRole
     * @return ContactPersonIn
     */
    public function withContactRole($contactRole)
    {
        $new = clone $this;
        $new->contactRole = $contactRole;

        return $new;
    }
}

