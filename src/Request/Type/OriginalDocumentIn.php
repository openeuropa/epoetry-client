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
     * @param string|null $fileName
     * @return $this
     */
    public function setFileName(?string $fileName) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
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
     * @param string|null $comment
     * @return $this
     */
    public function setComment(?string $comment) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
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
    public function setContent(?string $content) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
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

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticSections|null $linguisticSections
     * @return $this
     */
    public function setLinguisticSections(?\OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
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
     * @param bool|null $trackChanges
     * @return $this
     */
    public function setTrackChanges(?bool $trackChanges) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentIn
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

