<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class TicketTypes
{
    /**
     * @var string
     */
    private $ticketType;

    /**
     * @return string
     */
    public function getTicketType()
    {
        return $this->ticketType;
    }

    /**
     * @param string $ticketType
     * @return TicketTypes
     */
    public function withTicketType($ticketType)
    {
        $new = clone $this;
        $new->ticketType = $ticketType;

        return $new;
    }
}

