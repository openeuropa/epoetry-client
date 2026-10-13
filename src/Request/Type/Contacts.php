<?php

namespace OpenEuropa\EPoetry\Request\Type;

class Contacts
{
    /**
     * @var non-empty-array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\ContactPersonIn>
     */
    private $contact = [];

    /**
     * @param non-empty-array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\ContactPersonIn> $contact
     * @return $this
     */
    public function setContact(array $contact): static
    {
        $this->contact = $contact;
        return $this;
    }

    /**
     * @return non-empty-array<int<0,max>, \OpenEuropa\EPoetry\Request\Type\ContactPersonIn>
     */
    public function getContact(): array
    {
        return $this->contact;
    }

    /**
     * @param ContactPersonIn ...$contacts
     * @return $this
     */
    public function addContact(... $contacts): \OpenEuropa\EPoetry\Request\Type\Contacts
    {
        $this->contact = array_merge($this->contact, $contacts);return $this;
    }

    /**
     * @return bool
     */
    public function hasContact(): bool
    {
        return !empty($this->contact);
    }
}

