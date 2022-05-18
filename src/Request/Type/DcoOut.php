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
     * @return string
     */
    public function getApplicationName()
    {
        return $this->applicationName;
    }

    /**
     * @param string $applicationName
     * @return DcoOut
     */
    public function withApplicationName($applicationName)
    {
        $new = clone $this;
        $new->applicationName = $applicationName;

        return $new;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param \DateTimeInterface $deadline
     * @return DcoOut
     */
    public function withDeadline($deadline)
    {
        $new = clone $this;
        $new->deadline = $deadline;

        return $new;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     * @return DcoOut
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
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return DcoOut
     */
    public function withFormat($format)
    {
        $new = clone $this;
        $new->format = $format;

        return $new;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return DcoOut
     */
    public function withLanguage($language)
    {
        $new = clone $this;
        $new->language = $language;

        return $new;
    }

    /**
     * @return string
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * @param string $remark
     * @return DcoOut
     */
    public function withRemark($remark)
    {
        $new = clone $this;
        $new->remark = $remark;

        return $new;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return DcoOut
     */
    public function withStatus($status)
    {
        $new = clone $this;
        $new->status = $status;

        return $new;
    }
}

