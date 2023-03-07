<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class AcceptStrengths
{
    /**
     * @var string
     */
    private $strength;

    /**
     * @return string
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param string $strength
     * @return AcceptStrengths
     */
    public function withStrength($strength)
    {
        $new = clone $this;
        $new->strength = $strength;

        return $new;
    }
}

