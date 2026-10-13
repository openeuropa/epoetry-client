<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ContactPerson
{
    /**
     * @var null | string
     */
    private $firstName = null;

    /**
     * @var null | string
     */
    private $lastName = null;

    /**
     * @var null | string
     */
    private $email = null;

    /**
     * @var null | string
     */
    private $userId = null;

    /**
     * @var null | 'REQUESTER' | 'AUTHOR' | 'RECIPIENT' | 'WEBMASTER' | 'EDITOR' | 'DOCUMENT_AUTHOR' | 'DOSSIER_AUTHOR' | 'LEGISLATIVE_COORDINATOR' | 'SECRETARY' | 'CONTACT_PERSON'
     */
    private $roleCode = null;

    /**
     * @param null | string $firstName
     * @return $this
     */
    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @return bool
     */
    public function hasFirstName(): bool
    {
        return !empty($this->firstName);
    }

    /**
     * @param null | string $lastName
     * @return $this
     */
    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @return bool
     */
    public function hasLastName(): bool
    {
        return !empty($this->lastName);
    }

    /**
     * @param null | string $email
     * @return $this
     */
    public function setEmail(?string $email): static
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return bool
     */
    public function hasEmail(): bool
    {
        return !empty($this->email);
    }

    /**
     * @param null | string $userId
     * @return $this
     */
    public function setUserId(?string $userId): static
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @return bool
     */
    public function hasUserId(): bool
    {
        return !empty($this->userId);
    }

    /**
     * @param null | 'REQUESTER' | 'AUTHOR' | 'RECIPIENT' | 'WEBMASTER' | 'EDITOR' | 'DOCUMENT_AUTHOR' | 'DOSSIER_AUTHOR' | 'LEGISLATIVE_COORDINATOR' | 'SECRETARY' | 'CONTACT_PERSON' $roleCode
     * @return $this
     */
    public function setRoleCode(?string $roleCode): static
    {
        $this->roleCode = $roleCode;
        return $this;
    }

    /**
     * @return null | 'REQUESTER' | 'AUTHOR' | 'RECIPIENT' | 'WEBMASTER' | 'EDITOR' | 'DOCUMENT_AUTHOR' | 'DOSSIER_AUTHOR' | 'LEGISLATIVE_COORDINATOR' | 'SECRETARY' | 'CONTACT_PERSON'
     */
    public function getRoleCode(): ?string
    {
        return $this->roleCode;
    }

    /**
     * @return bool
     */
    public function hasRoleCode(): bool
    {
        return !empty($this->roleCode);
    }
}

