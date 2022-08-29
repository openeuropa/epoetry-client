<?php

namespace OpenEuropa\EPoetry\Request\Type;

class Contacts
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ContactPersonIn[]|array
     */
    private $contact = [];

    /**
     * @param ContactPersonIn[]|null $contact
     * @return $this
     */
    public function setContact(array $contact) : \OpenEuropa\EPoetry\Request\Type\Contacts
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ContactPersonIn[]|array|null
     */
    public function getContact() : array
    {
        return $this->contact;
    }

    /**
     * @param ContactPersonIn ...$contacts
     * @return $this
     */
    public function addContact(... $contacts) : \OpenEuropa\EPoetry\Request\Type\Contacts
    {
        $this->contact = array_merge($this->contact, $contacts);return $this;
    }

    /**
     * @return bool
     */
    public function hasContact() : bool
    {
        return !empty($this->contact);
    }
}

