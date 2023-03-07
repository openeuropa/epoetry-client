<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class Strengths
{
    /**
     * @var string
     */
    private $strength;

    /**
     * @var int
     */
    private $number;

    /**
     * @return string
     */
    public function getStrength()
    {
        return $this->strength;
    }

    /**
     * @param string $strength
     * @return Strengths
     */
    public function withStrength($strength)
    {
        $new = clone $this;
        $new->strength = $strength;

        return $new;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Strengths
     */
    public function withNumber($number)
    {
        $new = clone $this;
        $new->number = $number;

        return $new;
    }
}

