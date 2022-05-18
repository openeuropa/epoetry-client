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
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return OriginalDocumentIn
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return OriginalDocumentIn
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return OriginalDocumentIn
     */
    public function withContent($content)
    {
        $new = clone $this;
        $new->content = $content;

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
     * @return OriginalDocumentIn
     */
    public function withLinguisticSections($linguisticSections)
    {
        $new = clone $this;
        $new->linguisticSections = $linguisticSections;

        return $new;
    }

    /**
     * @return bool
     */
    public function getTrackChanges()
    {
        return $this->trackChanges;
    }

    /**
     * @param bool $trackChanges
     * @return OriginalDocumentIn
     */
    public function withTrackChanges($trackChanges)
    {
        $new = clone $this;
        $new->trackChanges = $trackChanges;

        return $new;
    }
}

