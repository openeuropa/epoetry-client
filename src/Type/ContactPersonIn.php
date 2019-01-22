<?php

namespace OpenEuropa\EPoetry\Type;

class ContactPersonIn
{

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
    public function getUserId() : string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     * @return $this
     */
    public function setUserId(string $userId) : \OpenEuropa\EPoetry\Type\ContactPersonIn
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
    public function setRoleCode(string $roleCode) : \OpenEuropa\EPoetry\Type\ContactPersonIn
    {
        $this->roleCode = $roleCode;
        return $this;
    }


}

