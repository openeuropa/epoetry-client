<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocumentOut
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Language
     */
    private $language;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentType
     */
    private $documentType;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentFormat
     */
    private $format;

    /**
     * @param string $fileName
     * @return $this
     */
    public function setFileName(string $fileName) : static
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFileName() : ?string
    {
        return $this->fileName;
    }

    /**
     * @return bool
     */
    public function hasFileName() : bool
    {
        return !empty($this->fileName);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\Language $language
     * @return $this
     */
    public function setLanguage(\OpenEuropa\EPoetry\Request\Type\Language $language) : static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Language|null
     */
    public function getLanguage() : ?\OpenEuropa\EPoetry\Request\Type\Language
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage() : bool
    {
        return !empty($this->language);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DocumentType $documentType
     * @return $this
     */
    public function setDocumentType(\OpenEuropa\EPoetry\Request\Type\DocumentType $documentType) : static
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentType|null
     */
    public function getDocumentType() : ?\OpenEuropa\EPoetry\Request\Type\DocumentType
    {
        return $this->documentType;
    }

    /**
     * @return bool
     */
    public function hasDocumentType() : bool
    {
        return !empty($this->documentType);
    }

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment(string $comment) : static
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getComment() : ?string
    {
        return $this->comment;
    }

    /**
     * @return bool
     */
    public function hasComment() : bool
    {
        return !empty($this->comment);
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\DocumentFormat $format
     * @return $this
     */
    public function setFormat(\OpenEuropa\EPoetry\Request\Type\DocumentFormat $format) : static
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\DocumentFormat|null
     */
    public function getFormat() : ?\OpenEuropa\EPoetry\Request\Type\DocumentFormat
    {
        return $this->format;
    }

    /**
     * @return bool
     */
    public function hasFormat() : bool
    {
        return !empty($this->format);
    }
}

