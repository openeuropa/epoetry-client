<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocumentOut
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $documentType;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var string
     */
    private $format;

    /**
     * @param string $fileName
     * @return $this
     */
    public function setFileName(string $fileName) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
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
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage() : ?string
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
     * @param string $documentType
     * @return $this
     */
    public function setDocumentType(string $documentType) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDocumentType() : ?string
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
    public function setComment(string $comment) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
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
     * @param string $format
     * @return $this
     */
    public function setFormat(string $format) : \OpenEuropa\EPoetry\Request\Type\AuxiliaryDocumentOut
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormat() : ?string
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

