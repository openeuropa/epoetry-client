<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class RegistrationLevelVersion
{
    /**
     * @var string
     */
    private $_;

    /**
     * @var int
     */
    private $level;

    /**
     * @return string
     */
    public function get_()
    {
        return $this->_;
    }

    /**
     * @param string $_
     * @return RegistrationLevelVersion
     */
    public function with_($_)
    {
        $new = clone $this;
        $new->_ = $_;

        return $new;
    }

    /**
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param int $level
     * @return RegistrationLevelVersion
     */
    public function withLevel($level)
    {
        $new = clone $this;
        $new->level = $level;

        return $new;
    }
}

