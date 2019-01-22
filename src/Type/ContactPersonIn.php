<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class ContactPersonIn
{
    /**
     * @var string
     */
    private $roleCode;

    /**
     * @var string
     */
    private $userId;

    /**
     * @return string
     */
    public function getRoleCode(): string
    {
        return $this->roleCode;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $roleCode
     *
     * @return $this
     */
    public function setRoleCode(string $roleCode): self
    {
        $this->roleCode = $roleCode;

        return $this;
    }

    /**
     * @param string $userId
     *
     * @return $this
     */
    public function setUserId(string $userId): self
    {
        $this->userId = $userId;

        return $this;
    }
}
