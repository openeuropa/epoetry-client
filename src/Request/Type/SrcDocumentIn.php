<?php

namespace OpenEuropa\EPoetry\Request\Type;

class SrcDocumentIn
{
    /**
     * @var null | string
     */
    private $fileName = null;

    /**
     * @var null | string
     */
    private $comment = null;

    /**
     * @var null | mixed
     */
    private $content = null;

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
     * @param null | mixed $content
     * @return $this
     */
    public function setContent(mixed $content): static
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return null | mixed
     */
    public function getContent(): mixed
    {
        return $this->content;
    }

    /**
     * @return bool
     */
    public function hasContent(): bool
    {
        return !empty($this->content);
    }
}

