<?php

namespace OpenEuropa\EPoetry\Request\Type;

class SrcDocumentIn
{
    /**
     * @var null|string
     */
    private $fileName;

    /**
     * @var null|string
     */
    private $comment;

    /**
     * @var null|string
     */
    private $content;

    /**
     * @param string $fileName
     * @return $this
     */
    public function setFileName(string $fileName) : \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn
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
     * @param string $comment
     * @return $this
     */
    public function setComment(string $comment) : \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn
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
     * @param string $content
     * @return $this
     */
    public function setContent(string $content) : \OpenEuropa\EPoetry\Request\Type\SrcDocumentIn
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContent() : ?string
    {
        return $this->content;
    }

    /**
     * @return bool
     */
    public function hasContent() : bool
    {
        return !empty($this->content);
    }
}

