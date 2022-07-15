<?php

namespace OpenEuropa\EPoetry\Request\Type;

class OriginalDocumentOut
{
    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @var string
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
     * Constructor
     *
     * @var bool $trackChanges
     * @var string $format
     * @var string $fileName
     * @var float $pages
     * @var string $comment
     * @var \OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections
     */
    public function __construct(bool $trackChanges, string $format, string $fileName, float $pages, string $comment, \OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections)
    {
        $this->trackChanges = $trackChanges;
        $this->format = $format;
        $this->fileName = $fileName;
        $this->pages = $pages;
        $this->comment = $comment;
        $this->linguisticSections = $linguisticSections;
    }

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
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

    /**
     * @param string $format
     * @return $this
     */
    public function setFormat(string $format) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormat() : string
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
    public function setFileName(string $fileName) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
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
     * @param float $pages
     * @return $this
     */
    public function setPages(float $pages) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
    {
        $this->pages = $pages;
        return $this;
    }

    /**
     * @return float
     */
    public function getPages() : float
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
    public function setComment(string $comment) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
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
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections
     * @return $this
     */
    public function setLinguisticSections(\OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections) : \OpenEuropa\EPoetry\Request\Type\OriginalDocumentOut
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
}

