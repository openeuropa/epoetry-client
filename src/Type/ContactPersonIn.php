<?php

namespace OpenEuropa\EPoetry\Type;

class ContactPersonIn
{

    /**
     * @var string
     */
    private $userId;

    /**
     * @var \OpenEuropa\EPoetry\Type\ContactRole
     */
    private $roleCode;

    /**
     * Constructor
     *
     * @var string $userId
     * @var \OpenEuropa\EPoetry\Type\ContactRole $roleCode
     */
    public function __construct(string $userId, \OpenEuropa\EPoetry\Type\ContactRole $roleCode)
    {
        $this->userId = $userId;
        $this->roleCode = $roleCode;
    }

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
     * @return \OpenEuropa\EPoetry\Type\ContactRole
     */
    public function getRoleCode() : \OpenEuropa\EPoetry\Type\ContactRole
    {
        return $this->roleCode;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ContactRole $roleCode
     * @return $this
     */
    public function setRoleCode($roleCode) : \OpenEuropa\EPoetry\Type\ContactPersonIn
    {
        $this->roleCode = $roleCode;
        return $this;
    }
}
