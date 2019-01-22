<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class Contacts
{
    /**
     * @var \OpenEuropa\EPoetry\Type\ContactPerson[]
     */
    private $contact;

    /**
     * @param \OpenEuropa\EPoetry\Type\ContactPerson $contact
     *
     * @return $this
     */
    public function addContact(ContactPerson $contact): self
    {
        $this->contact = \is_array($this->contact) ? $this->contact : [];
        $this->contact[] = $contact;

        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\ContactPerson[]
     */
    public function getContact(): array
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
