<?php

namespace OpenEuropa\EPoetry\Type;

class DgtDocumentIn
{

    /**
     * @var \OpenEuropa\EPoetry\Type\Base64Binary
     */
    private $file;

    /**
     * @var \OpenEuropa\EPoetry\Type\DocumentFormat
     */
    private $format;

    /**
     * @var \OpenEuropa\EPoetry\Type\DocumentTypeIn
     */
    private $type;

    /**
     * @var string
     */
    private $name;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\Base64Binary $file
     * @var \OpenEuropa\EPoetry\Type\DocumentFormat $format
     * @var \OpenEuropa\EPoetry\Type\DocumentTypeIn $type
     * @var string $name
     */
    public function __construct(\OpenEuropa\EPoetry\Type\Base64Binary $file, \OpenEuropa\EPoetry\Type\DocumentFormat $format, \OpenEuropa\EPoetry\Type\DocumentTypeIn $type, string $name)
    {
        $this->file = $file;
        $this->format = $format;
        $this->type = $type;
        $this->name = $name;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\Base64Binary
     */
    public function getFile() : \OpenEuropa\EPoetry\Type\Base64Binary
    {
        return $this->file;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\Base64Binary $file
     * @return $this
     */
    public function setFile($file) : \OpenEuropa\EPoetry\Type\DgtDocumentIn
    {
        $this->file = $file;
        return $this;
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
    public function setFormat($format) : \OpenEuropa\EPoetry\Type\DgtDocumentIn
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\DocumentTypeIn
     */
    public function getType() : \OpenEuropa\EPoetry\Type\DocumentTypeIn
    {
        return $this->type;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\DocumentTypeIn $type
     * @return $this
     */
    public function setType($type) : \OpenEuropa\EPoetry\Type\DgtDocumentIn
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
    public function setName(string $name) : \OpenEuropa\EPoetry\Type\DgtDocumentIn
    {
        $this->name = $name;
        return $this;
    }
}
