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
     * @var string
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
     * Constructor
     *
     * @var string $fileName
     * @var string $comment
     * @var string $content
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections
     * @var bool $trackChanges
     */
    public function __construct(string $fileName, string $comment, string $content, \OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections, bool $trackChanges)
    {
        $this->fileName = $fileName;
        $this->comment = $comment;
        $this->content = $content;
        $this->linguisticSections = $linguisticSections;
        $this->trackChanges = $trackChanges;
    }

    /**
     * @param string $fileName
     * @return $this
     */
    public function setFileName(string $fileName) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileName() : string
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
    public function setComment(string $comment) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment() : string
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
    public function setContent(string $content) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent() : string
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
    public function setLinguisticSections($linguisticSections) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
    {
        $this->linguisticSections = $linguisticSections;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticSections
     */
    public function getLinguisticSections() : \OpenEuropa\EPoetry\Request\Type\LinguisticSections
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
    public function setTrackChanges(bool $trackChanges) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTrackChanges() : bool
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

