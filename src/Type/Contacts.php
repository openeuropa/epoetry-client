<?php

namespace OpenEuropa\EPoetry\Type;

class Contacts
{

    /**
     * @var \OpenEuropa\EPoetry\Type\ContactPerson
     */
    private $contact;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\ContactPerson $contact
     */
    public function __construct(\OpenEuropa\EPoetry\Type\ContactPerson $contact)
    {
        $this->contact = $contact;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\ContactPerson
     */
    public function getContact() : \OpenEuropa\EPoetry\Type\ContactPerson
    {
        return $this->contact;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\ContactPerson $contact
     * @return $this
     */
    public function setContact($contact) : \OpenEuropa\EPoetry\Type\Contacts
    {
        $this->contact = $contact;
        return $this;
    }
}
