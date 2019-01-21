<?php

namespace OpenEuropa\EPoetry\Type;

class DgtDocument
{

    /**
     * @var \OpenEuropa\EPoetry\Type\DocumentFormat
     */
    private $format;

    /**
     * @var \OpenEuropa\EPoetry\Type\DocumentType
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\DocumentFormat $format
     * @var \OpenEuropa\EPoetry\Type\DocumentType $type
     * @var string $name
     */
    public function __construct(\OpenEuropa\EPoetry\Type\DocumentFormat $format, \OpenEuropa\EPoetry\Type\DocumentType $type, string $name)
    {
        $this->format = $format;
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\DocumentFormat
     */
    public function getFormat() : \OpenEuropa\EPoetry\Type\DocumentFormat
    {
        return $this->format;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\DocumentFormat $format
     * @return $this
     */
    public function setFormat($format) : \OpenEuropa\EPoetry\Type\DgtDocument
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\DocumentType
     */
    public function getType() : \OpenEuropa\EPoetry\Type\DocumentType
    {
        return $this->type;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\DocumentType $type
     * @return $this
     */
    public function setType($type) : \OpenEuropa\EPoetry\Type\DgtDocument
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
