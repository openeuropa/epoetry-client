<?php

namespace OpenEuropa\EPoetry\Request\Type;

class DossierReference
{
    /**
     * @var string
     */
    private $requesterCode;

    /**
     * @var int
     */
    private $number;

    /**
     * @var int
     */
    private $year;

    /**
     * @return string
     */
    public function getRequesterCode()
    {
        return $this->requesterCode;
    }

    /**
     * @param string $requesterCode
     * @return DossierReference
     */
    public function withRequesterCode($requesterCode)
    {
        $new = clone $this;
        $new->requesterCode = $requesterCode;

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
     * @return DossierReference
     */
    public function withNumber($number)
    {
        $new = clone $this;
        $new->number = $number;

        return $new;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     * @return DossierReference
     */
    public function withYear($year)
    {
        $new = clone $this;
        $new->year = $year;

        return $new;
    }
}

