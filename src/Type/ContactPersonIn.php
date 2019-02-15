<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class ContactPersonIn
{
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
