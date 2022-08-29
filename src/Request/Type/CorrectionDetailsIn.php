<?php

namespace OpenEuropa\EPoetry\Request\Type;

class CorrectionDetailsIn
{
    /**
     * @var \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn
     */
    private $requestReference;

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $format;

    /**
     * @var string
     */
    private $language;

    /**
     * @var string
     */
    private $remark;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn|null $requestReference
     * @return $this
     */
    public function setRequestReference(?\OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn $requestReference) : \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn|null
     */
    public function getRequestReference() : ?\OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn
    {
        return $this->requestReference;
    }

    /**
     * @return bool
     */
    public function hasRequestReference() : bool
    {
        return !empty($this->requestReference);
    }

    /**
     * @param string|null $fileName
     * @return $this
     */
    public function setFileName(?string $fileName) : \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
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
     * @param string|null $content
     * @return $this
     */
    public function setContent(?string $content) : \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
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
     * @param string|null $format
     * @return $this
     */
    public function setFormat(?string $format) : \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFormat() : ?string
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
     * @param string|null $language
     * @return $this
     */
    public function setLanguage(?string $language) : \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getLanguage() : ?string
    {
        return $this->language;
    }

    /**
     * @return bool
     */
    public function hasLanguage() : bool
    {
        return !empty($this->language);
    }

    /**
     * @param string|null $remark
     * @return $this
     */
    public function setRemark(?string $remark) : \OpenEuropa\EPoetry\Request\Type\CorrectionDetailsIn
    {
        $this->remark = $remark;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getRemark() : ?string
    {
        return $this->remark;
    }

    /**
     * @return bool
     */
    public function hasRemark() : bool
    {
        return !empty($this->remark);
    }
}

