<?php

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
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getFormat() : string
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return $this
     */
    public function setFormat(string $format) : \OpenEuropa\EPoetry\Type\DgtDocument
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return $this
     */
    public function setType(string $type) : \OpenEuropa\EPoetry\Type\DgtDocument
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name) : \OpenEuropa\EPoetry\Type\DgtDocument
    {
        $this->name = $name;
        return $this;
    }
}
