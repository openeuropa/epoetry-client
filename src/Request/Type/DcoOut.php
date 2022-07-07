<?php

namespace OpenEuropa\EPoetry\Request\Type;

class DcoOut
{
    /**
     * @var null|string
     */
    private $applicationName;

    /**
     * @var null|\DateTimeInterface
     */
    private $deadline;

    /**
     * @var null|string
     */
    private $fileName;

    /**
     * @var null|string
     */
    private $format;

    /**
     * @var null|string
     */
    private $language;

    /**
     * @var null|string
     */
    private $remark;

    /**
     * @var null|string
     */
    private $status;

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
    public function setDeadline($deadline) : \OpenEuropa\EPoetry\Request\Type\DcoOut
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
    public function setFileName(string $fileName) : \OpenEuropa\EPoetry\Request\Type\DcoOut
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
     * @param string $format
     * @return $this
     */
    public function setFormat(string $format) : \OpenEuropa\EPoetry\Request\Type\DcoOut
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
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language) : \OpenEuropa\EPoetry\Request\Type\DcoOut
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
     * @param string $remark
     * @return $this
     */
    public function setRemark(string $remark) : \OpenEuropa\EPoetry\Request\Type\DcoOut
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
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status) : \OpenEuropa\EPoetry\Request\Type\DcoOut
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStatus() : ?string
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

