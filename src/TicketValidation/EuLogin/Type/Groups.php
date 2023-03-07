<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class Groups
{
    /**
     * @var string
     */
    private $group;

    /**
     * @var int
     */
    private $number;

    /**
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param string $group
     * @return Groups
     */
    public function withGroup($group)
    {
        $new = clone $this;
        $new->group = $group;

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
     * @return Groups
     */
    public function withNumber($number)
    {
        $new = clone $this;
        $new->number = $number;

        return $new;
    }
}

