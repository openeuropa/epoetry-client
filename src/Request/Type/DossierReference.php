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
     * @param string $requesterCode
     * @return $this
     */
    public function setRequesterCode(string $requesterCode) : static
    {
        $this->requesterCode = $requesterCode;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequesterCode() : ?string
    {
        return $this->requesterCode;
    }

    /**
     * @return bool
     */
    public function hasRequesterCode() : bool
    {
        return !empty($this->requesterCode);
    }

    /**
     * @param int $number
     * @return $this
     */
    public function setNumber(int $number) : static
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getNumber() : ?int
    {
        return $this->number;
    }

    /**
     * @return bool
     */
    public function hasNumber() : bool
    {
        return !empty($this->number);
    }

    /**
     * @param int $year
     * @return $this
     */
    public function setYear(int $year) : static
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getYear() : ?int
    {
        return $this->year;
    }

    /**
     * @return bool
     */
    public function hasYear() : bool
    {
        return !empty($this->year);
    }
}

