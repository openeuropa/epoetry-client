<?php

namespace OpenEuropa\EPoetry\Request\Type;

class Dossier
{
    /**
     * @var null | string
     */
    private $requesterCode = null;

    /**
     * @var null | int
     */
    private $number = null;

    /**
     * @var null | int
     */
    private $year = null;

    /**
     * @param null | string $requesterCode
     * @return $this
     */
    public function setRequesterCode(?string $requesterCode): static
    {
        $this->requesterCode = $requesterCode;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getRequesterCode(): ?string
    {
        return $this->requesterCode;
    }

    /**
     * @return bool
     */
    public function hasRequesterCode(): bool
    {
        return !empty($this->requesterCode);
    }

    /**
     * @param null | int $number
     * @return $this
     */
    public function setNumber(?int $number): static
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return null | int
     */
    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @return bool
     */
    public function hasNumber(): bool
    {
        return !empty($this->number);
    }

    /**
     * @param null | int $year
     * @return $this
     */
    public function setYear(?int $year): static
    {
        $this->year = $year;
        return $this;
    }

    /**
     * @return null | int
     */
    public function getYear(): ?int
    {
        return $this->year;
    }

    /**
     * @return bool
     */
    public function hasYear(): bool
    {
        return !empty($this->year);
    }
}

