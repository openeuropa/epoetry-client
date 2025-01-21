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
     * @var \OpenEuropa\EPoetry\Request\Type\Base64Binary
     */
    private $content;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\DocumentFormat
     */
    private $format;

    /**
     * @var \OpenEuropa\EPoetry\Request\Type\Language
     */
    private $language;

    /**
     * @var string
     */
    private $remark;

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn $requestReference
     * @return $this
     */
    public function setRequestReference(\OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn $requestReference) : static
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
     * @param \OpenEuropa\EPoetry\Request\Type\Base64Binary $content
     * @return $this
     */
    public function setContent(\OpenEuropa\EPoetry\Request\Type\Base64Binary $content) : static
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Base64Binary|null
     */
    public function getContent() : ?\OpenEuropa\EPoetry\Request\Type\Base64Binary
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
     * @param \OpenEuropa\EPoetry\Request\Type\Language $language
     * @return $this
     */
    public function setLanguage(\OpenEuropa\EPoetry\Request\Type\Language $language) : static
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\Language|null
     */
    public function getLanguage() : ?\OpenEuropa\EPoetry\Request\Type\Language
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
     * @param string $remark
     * @return $this
     */
    public function setRemark(string $remark) : static
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

