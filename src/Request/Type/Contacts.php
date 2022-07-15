<?php

namespace OpenEuropa\EPoetry\Request\Type;

class Contacts
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\ContactPersonIn
     */
    private $contact;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Request\Type\ContactPersonIn $contact
     */
    public function __construct(\OpenEuropa\EPoetry\Request\Type\ContactPersonIn $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ContactPersonIn $contact
     * @return $this
     */
    public function setContact($contact) : \OpenEuropa\EPoetry\Request\Type\Contacts
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ContactPersonIn|null
     */
    public function getContact() : ?\OpenEuropa\EPoetry\Request\Type\ContactPersonIn
    {
        return $this->contact;
    }

    /**
     * @return bool
     */
    public function hasContact() : bool
    {
        return !empty($this->contact);
    }
}

