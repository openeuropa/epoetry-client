<?php

namespace OpenEuropa\EPoetry\Request\Type;

class OriginalDocumentOut
{
    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @var null | string
     */
    private $format = null;

    /**
     * @var null | string
     */
    private $fileName = null;

    /**
     * @var null | float
     */
    private $pages = null;

    /**
     * @var null | string
     */
    private $comment = null;

    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\LinguisticSections
     */
    private $linguisticSections = null;

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges): static
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTrackChanges(): bool
    {
        return $this->trackChanges;
    }

    /**
     * @return bool
     */
    public function hasTrackChanges(): bool
    {
        return !empty($this->trackChanges);
    }

    /**
     * @param null | string $format
     * @return $this
     */
    public function setFormat(?string $format): static
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getFormat(): ?string
    {
        return $this->format;
    }

    /**
     * @return bool
     */
    public function hasFormat(): bool
    {
        return !empty($this->format);
    }

    /**
     * @param null | string $fileName
     * @return $this
     */
    public function setFileName(?string $fileName): static
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @return bool
     */
    public function hasFileName(): bool
    {
        return !empty($this->fileName);
    }

    /**
     * @param null | float $pages
     * @return $this
     */
    public function setPages(?float $pages): static
    {
        $this->pages = $pages;
        return $this;
    }

    /**
     * @return null | float
     */
    public function getPages(): ?float
    {
        return $this->pages;
    }

    /**
     * @return bool
     */
    public function hasPages(): bool
    {
        return !empty($this->pages);
    }

    /**
     * @param null | string $comment
     * @return $this
     */
    public function setComment(?string $comment): static
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * @return bool
     */
    public function hasComment(): bool
    {
        return !empty($this->comment);
    }

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections
     * @return $this
     */
    public function setLinguisticSections(?\OpenEuropa\EPoetry\Request\Type\LinguisticSections $linguisticSections): static
    {
        $this->linguisticSections = $linguisticSections;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\LinguisticSections
     */
    public function getLinguisticSections(): ?\OpenEuropa\EPoetry\Request\Type\LinguisticSections
    {
        return $this->linguisticSections;
    }

    /**
     * @return bool
     */
    public function hasLinguisticSections(): bool
    {
        return !empty($this->linguisticSections);
    }
}

