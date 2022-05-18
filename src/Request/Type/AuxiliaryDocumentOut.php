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
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return AuxiliaryDocumentOut
     */
    public function withFileName($fileName)
    {
        $new = clone $this;
        $new->fileName = $fileName;

        return $new;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return AuxiliaryDocumentOut
     */
    public function withLanguage($language)
    {
        $new = clone $this;
        $new->language = $language;

        return $new;
    }

    /**
     * @return string
     */
    public function getDocumentType()
    {
        return $this->documentType;
    }

    /**
     * @param string $documentType
     * @return AuxiliaryDocumentOut
     */
    public function withDocumentType($documentType)
    {
        $new = clone $this;
        $new->documentType = $documentType;

        return $new;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return AuxiliaryDocumentOut
     */
    public function withComment($comment)
    {
        $new = clone $this;
        $new->comment = $comment;

        return $new;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return AuxiliaryDocumentOut
     */
    public function withFormat($format)
    {
        $new = clone $this;
        $new->format = $format;

        return $new;
    }
}

