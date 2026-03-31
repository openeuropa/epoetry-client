<?php

namespace OpenEuropa\EPoetry\Request\Type;

class CorrectionDetailsIn
{
    /**
     * @var null | \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn
     */
    private $requestReference = null;

    /**
     * @var null | string
     */
    private $fileName = null;

    /**
     * @var null | mixed
     */
    private $content = null;

    /**
     * @var null | string
     */
    private $format = null;

    /**
     * @var null | string
     */
    private $language = null;

    /**
     * @var null | string
     */
    private $remark = null;

    /**
     * @param null | \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn $requestReference
     * @return $this
     */
    public function setRequestReference(?\OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn $requestReference): static
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return null | \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn
     */
    public function getRequestReference(): ?\OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn
    {
        return $this->requestReference;
    }

    /**
     * @return bool
     */
    public function hasRequestReference(): bool
    {
        return !empty($this->requestReference);
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
     * @param null | string $remark
     * @return $this
     */
    public function setRemark(?string $remark): static
    {
        $this->remark = $remark;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getRemark(): ?string
    {
        return $this->remark;
    }

    /**
     * @return bool
     */
    public function hasRemark(): bool
    {
        return !empty($this->remark);
    }
}

