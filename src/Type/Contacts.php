<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class Contacts
{
    /**
     * @var array
     */
    private $contact = [];

    /**
     * @param \OpenEuropa\EPoetry\Type\ContactPerson $contact
     *
     * @return $this
     */
    public function addContact(ContactPerson $contact)
    {
        $this->contact = \is_array($this->contact) ? $this->contact : [];
        $this->contact[] = $contact;

        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\ContactPerson
     */
    public function getContact(): ContactPerson
    {
        return $this->contact;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ContactPerson $contact
     *
     * @return $this
     */
    public function setContact($contact): self
    {
        $this->contact = $contact;

        return $this;
    }
}
