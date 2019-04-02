<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

class Contacts
{
    /**
     * @var array|\OpenEuropa\EPoetry\Request\Type\ContactPerson[]
     */
    protected $contact = [];

    /**
     * @param ContactPerson ...$contacts
     *
     * @return $this
     */
    public function addContact(...$contacts): Contacts
    {
        $this->contact = array_merge($this->contact, $contacts);

        return $this;
    }

    /**
     * @return array|\OpenEuropa\EPoetry\Request\Type\ContactPerson[]
     */
    public function getContact(): array
    {
        return $this->contact;
    }

    /**
     * @return bool
     */
    public function hasContact(): bool
    {
        return !empty($this->contact);
    }

    /**
     * @param ContactPerson[] $contact
     *
     * @return $this
     */
    public function setContact(array $contact): Contacts
    {
        $this->contact = $contact;

        return $this;
    }
}
