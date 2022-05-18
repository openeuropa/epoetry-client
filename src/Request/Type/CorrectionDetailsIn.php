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
     * @return \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Request\Type\CorrectionReferenceIn $requestReference
     * @return CorrectionDetailsIn
     */
    public function withRequestReference($requestReference)
    {
        $new = clone $this;
        $new->requestReference = $requestReference;

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
     * @return CorrectionDetailsIn
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return CorrectionDetailsIn
     */
    public function withContent($content)
    {
        $new = clone $this;
        $new->content = $content;

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
     * @return CorrectionDetailsIn
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
     * @return CorrectionDetailsIn
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
     * @return CorrectionDetailsIn
     */
    public function withRemark($remark)
    {
        $new = clone $this;
        $new->remark = $remark;

        return $new;
    }
}

