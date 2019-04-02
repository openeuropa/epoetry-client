<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification\Type;

class Language
{
    /**
     * @var null|string
     */
    protected $code;

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @return bool
     */
    public function hasCode(): bool
    {
        return !empty($this->code);
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode(string $code): Language
    {
        $this->code = $code;

        return $this;
    }
}
