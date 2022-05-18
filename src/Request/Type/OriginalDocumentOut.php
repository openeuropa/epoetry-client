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
     * @return bool
     */
    public function getTrackChanges()
    {
        return $this->trackChanges;
    }

    /**
     * @param bool $trackChanges
     * @return OriginalDocumentOut
     */
    public function withTrackChanges($trackChanges)
    {
        $new = clone $this;
        $new->trackChanges = $trackChanges;

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
     * @return OriginalDocumentOut
     */
    public function withFormat($format)
    {
        $new = clone $this;
        $new->format = $format;

        return $new;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return OriginalDocumentOut
     */
    public function withFileName($fileName)
    {
        $new = clone $this;
        $new->fileName = $fileName;

        return $new;
    }

    /**
     * @return float
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param float $pages
     * @return OriginalDocumentOut
     */
    public function withPages($pages)
    {
        $new = clone $this;
        $new->pages = $pages;

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
     * @return OriginalDocumentOut
     */
    public function withComment($comment)
    {
        $new = clone $this;
        $new->comment = $comment;

        return $new;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\LinguisticSections
     */
    public function getLinguisticSections()
    {
        return $this->linguisticSections;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections
     * @return OriginalDocumentOut
     */
    public function withLinguisticSections($linguisticSections)
    {
        $new = clone $this;
        $new->linguisticSections = $linguisticSections;

        return $new;
    }
}

