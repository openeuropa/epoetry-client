<?php

namespace OpenEuropa\EPoetry\Request\Type;

class OriginalDocumentOut
{
    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentFormat
     */
    private $format;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var float
     */
    private $pages;

    /**
     * @var string
     */
    private $comment;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticSections
     */
    private $linguisticSections;

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
     * @param float $pages
     * @return $this
     */
    public function setPages(float $pages) : static
    {
        $this->pages = $pages;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getPages() : ?float
    {
        return $this->pages;
    }

    /**
     * @return bool
     */
    public function hasPages() : bool
    {
        return !empty($this->pages);
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
}

