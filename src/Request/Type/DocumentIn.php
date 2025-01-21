<?php

namespace OpenEuropa\EPoetry\Request\Type;

class DocumentIn
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
     * @var string
     */
    private $comment;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Base64Binary
     */
    private $content;

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
     * @param \OpenEuropa\EPoetry\Request\Type\Base64Binary $content
     * @return $this
     */
    public function setContent(\OpenEuropa\EPoetry\Request\Type\Base64Binary $content) : static
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Base64Binary|null
     */
    public function getContent() : ?\OpenEuropa\EPoetry\Request\Type\Base64Binary
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

