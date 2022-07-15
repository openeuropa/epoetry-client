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
     * @var string
     */
    private $status;

    /**
     * Constructor
     *
     * @var string $applicationName
     * @var \DateTimeInterface $deadline
     * @var string $fileName
     * @var string $format
     * @var string $language
     * @var string $remark
     * @var string $status
     */
    public function __construct(string $applicationName, \DateTimeInterface $deadline, string $fileName, string $format, string $language, string $remark, string $status)
    {
        $this->applicationName = $applicationName;
        $this->deadline = $deadline;
        $this->fileName = $fileName;
        $this->format = $format;
        $this->language = $language;
        $this->remark = $remark;
        $this->status = $status;
    }

    /**
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName) : \OpenEuropa\EPoetry\Request\Type\DcoOut
    {
        $this->applicationName = $applicationName;
        return $this;
    }

    /**
     * @return string
     */
    public function getApplicationName() : string
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
    public function setDeadline($deadline) : \OpenEuropa\EPoetry\Request\Type\DcoOut
    {
        $this->deadline = $deadline;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDeadline() : \DateTimeInterface
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
    public function setFileName(string $fileName) : \OpenEuropa\EPoetry\Request\Type\DcoOut
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
     * @param string $format
     * @return $this
     */
    public function setFormat(string $format) : \OpenEuropa\EPoetry\Request\Type\DcoOut
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
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language) : \OpenEuropa\EPoetry\Request\Type\DcoOut
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage() : string
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
    public function setRemark(string $remark) : \OpenEuropa\EPoetry\Request\Type\DcoOut
    {
        $this->remark = $remark;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemark() : string
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
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status) : \OpenEuropa\EPoetry\Request\Type\DcoOut
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus() : string
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

