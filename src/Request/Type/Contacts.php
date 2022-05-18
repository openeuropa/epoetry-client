<?php

namespace OpenEuropa\EPoetry\Request\Type;

class Contacts
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\ContactPersonIn
     */
    private $contact;

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\ContactPersonIn
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\ContactPersonIn $contact
     * @return Contacts
     */
    public function withContact($contact)
    {
        $new = clone $this;
        $new->contact = $contact;

        return $new;
    }
}

