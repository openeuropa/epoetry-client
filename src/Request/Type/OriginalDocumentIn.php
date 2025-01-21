<?php

namespace OpenEuropa\EPoetry\Request\Type;

class OriginalDocumentIn
{
    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Base64Binary
     */
    private $content;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticSections
     */
    private $linguisticSections;

    /**
     * @var bool
     */
    private $trackChanges;

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

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections
     * @return $this
     */
    public function setLinguisticSections(\OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections) : static
    {
        $this->linguisticSections = $linguisticSections;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticSections|null
     */
    public function getLinguisticSections() : ?\OpenEuropa\EPoetry\Request\Type\LinguisticSections
    {
        return $this->linguisticSections;
    }

    /**
     * @return bool
     */
    public function hasLinguisticSections() : bool
    {
        return !empty($this->linguisticSections);
    }

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges) : static
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isTrackChanges() : ?bool
    {
        return $this->trackChanges;
    }

    /**
     * @return bool
     */
    public function hasTrackChanges() : bool
    {
        return !empty($this->trackChanges);
    }
}

