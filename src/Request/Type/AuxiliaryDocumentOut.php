<?php

namespace OpenEuropa\EPoetry\Request\Type;

class AuxiliaryDocumentOut
{
    /**
     * @var null | string
     */
    private $fileName = null;

    /**
     * @var null | string
     */
    private $language = null;

    /**
     * @var null | string
     */
    private $documentType = null;

    /**
     * @var null | string
     */
    private $comment = null;

    /**
     * @var null | string
     */
    private $format = null;

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
     * @param null | string $language
     * @return $this
     */
    public function setLanguage(?string $language): static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getLanguage(): ?string
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage(): bool
    {
        return !empty($this->language);
    }

    /**
     * @param null | string $documentType
     * @return $this
     */
    public function setDocumentType(?string $documentType): static
    {
        $this->documentType = $documentType;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    /**
     * @return bool
     */
    public function hasDocumentType(): bool
    {
        return !empty($this->documentType);
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
}

