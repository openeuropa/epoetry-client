<?php

namespace OpenEuropa\EPoetry\Request\Type;

class DcoOut
{
    /**
     * @var string
     */
    private $applicationName;

    /**
     * @var \DateTimeInterface
     */
    private $deadline;

    /**
     * @var string
     */
    private $fileName;

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
     * @var \OpenEuropa\EPoetry\Request\Type\RequestStatus
     */
    private $status;

    /**
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName) : static
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApplicationName() : ?string
    {
        return $this->applicationName;
    }

    /**
     * @return bool
     */
    public function hasApplicationName() : bool
    {
        return !empty($this->applicationName);
    }

    /**
     * @param \DateTimeInterface $deadline
     * @return $this
     */
    public function setDeadline(\DateTimeInterface $deadline) : static
    {
        $this->deadline = $deadline;
        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDeadline() : ?\DateTimeInterface
    {
        return $this->deadline;
    }

    /**
     * @return bool
     */
    public function hasDeadline() : bool
    {
        return !empty($this->deadline);
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

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\RequestStatus $status
     * @return $this
     */
    public function setStatus(\OpenEuropa\EPoetry\Request\Type\RequestStatus $status) : static
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Request\Type\RequestStatus|null
     */
    public function getStatus() : ?\OpenEuropa\EPoetry\Request\Type\RequestStatus
    {
        return $this->status;
    }

    /**
     * @return bool
     */
    public function hasStatus() : bool
    {
        return !empty($this->status);
    }
}

