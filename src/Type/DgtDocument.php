<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class DgtDocument
{
    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $type;

    /**
     * @return string
     */
    public function getFormat(): string
    {
        return $this->format;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $format
     *
     * @return $this
     */
    public function setFormat(string $format): DgtDocument
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): DgtDocument
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type): DgtDocument
    {
        $this->type = $type;

        return $this;
    }
}
