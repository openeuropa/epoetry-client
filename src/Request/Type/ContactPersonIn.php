<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ContactPersonIn
{
    /**
     * @var string
     */
    private $userId;

    /**
     * @var 'REQUESTER' | 'AUTHOR' | 'RECIPIENT' | 'WEBMASTER' | 'EDITOR' | 'DOCUMENT_AUTHOR' | 'DOSSIER_AUTHOR' | 'LEGISLATIVE_COORDINATOR' | 'SECRETARY' | 'CONTACT_PERSON'
     */
    private $contactRole;

    /**
     * Constructor
     *
     * @param string $userId
     * @param 'REQUESTER' | 'AUTHOR' | 'RECIPIENT' | 'WEBMASTER' | 'EDITOR' | 'DOCUMENT_AUTHOR' | 'DOSSIER_AUTHOR' | 'LEGISLATIVE_COORDINATOR' | 'SECRETARY' | 'CONTACT_PERSON' $contactRole
     */
    public function __construct(string $userId, string $contactRole)
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
     * @param 'REQUESTER' | 'AUTHOR' | 'RECIPIENT' | 'WEBMASTER' | 'EDITOR' | 'DOCUMENT_AUTHOR' | 'DOSSIER_AUTHOR' | 'LEGISLATIVE_COORDINATOR' | 'SECRETARY' | 'CONTACT_PERSON' $contactRole
     * @return $this
     */
    public function setContactRole(string $contactRole) : static
    {
        $this->contactRole = $contactRole;
        return $this;
    }

    /**
     * @return 'REQUESTER' | 'AUTHOR' | 'RECIPIENT' | 'WEBMASTER' | 'EDITOR' | 'DOCUMENT_AUTHOR' | 'DOSSIER_AUTHOR' | 'LEGISLATIVE_COORDINATOR' | 'SECRETARY' | 'CONTACT_PERSON'
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

