<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface;

class ContactPersonIn implements \OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface
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
     * @return \OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface
     */
    public function setRoleCode(string $roleCode): ContactPersonInterface
    {
        $this->roleCode = $roleCode;

        return $this;
    }

    /**
     * @param string $userId
     *
     * @return \OpenEuropa\EPoetry\TypeInterface\ContactPersonInterface
     */
    public function setUserId(string $userId): ContactPersonInterface
    {
        $this->userId = $userId;

        return $this;
    }
}
