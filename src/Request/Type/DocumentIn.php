<?php

namespace OpenEuropa\EPoetry\Request\Type;

class DocumentIn
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
    private $comment;

    /**
     * @var string
     */
    private $content;

    /**
     * @param string|null $fileName
     * @return $this
     */
    public function setFileName(?string $fileName) : \OpenEuropa\EPoetry\Request\Type\DocumentIn
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
     * @param string|null $language
     * @return $this
     */
    public function setLanguage(?string $language) : \OpenEuropa\EPoetry\Request\Type\DocumentIn
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
     * @param string|null $comment
     * @return $this
     */
    public function setComment(?string $comment) : \OpenEuropa\EPoetry\Request\Type\DocumentIn
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
     * @param string|null $content
     * @return $this
     */
    public function setContent(?string $content) : \OpenEuropa\EPoetry\Request\Type\DocumentIn
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

