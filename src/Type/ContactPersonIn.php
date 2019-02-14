<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class ContactPersonIn
{
    /**
     * @var string
     */
    protected $roleCode;

    /**
     * @var string
     */
    protected $userId;

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
     * @param string $roleCode
     *
     * @return $this
     */
    public function setRoleCode(string $roleCode): ContactPersonIn
    {
        $this->roleCode = $roleCode;

        return $this;
    }

    /**
     * @param string $userId
     *
     * @return $this
     */
    public function setUserId(string $userId): ContactPersonIn
    {
        $this->userId = $userId;

        return $this;
    }
}
