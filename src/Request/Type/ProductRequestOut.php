<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequestOut
{
    /**
     * @var string
     */
    private $language;

    /**
     * @var \DateTimeInterface
     */
    private $requestedDeadline;

    /**
     * @var \DateTimeInterface
     */
    private $acceptedDeadline;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $format;

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return ProductRequestOut
     */
    public function withLanguage($language)
    {
        $new = clone $this;
        $new->language = $language;

        return $new;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getRequestedDeadline()
    {
        return $this->requestedDeadline;
    }

    /**
     * @param \DateTimeInterface $requestedDeadline
     * @return ProductRequestOut
     */
    public function withRequestedDeadline($requestedDeadline)
    {
        $new = clone $this;
        $new->requestedDeadline = $requestedDeadline;

        return $new;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getAcceptedDeadline()
    {
        return $this->acceptedDeadline;
    }

    /**
     * @param \DateTimeInterface $acceptedDeadline
     * @return ProductRequestOut
     */
    public function withAcceptedDeadline($acceptedDeadline)
    {
        $new = clone $this;
        $new->acceptedDeadline = $acceptedDeadline;

        return $new;
    }

    /**
     * @return bool
     */
    public function getTrackChanges()
    {
        return $this->trackChanges;
    }

    /**
     * @param bool $trackChanges
     * @return ProductRequestOut
     */
    public function withTrackChanges($trackChanges)
    {
        $new = clone $this;
        $new->trackChanges = $trackChanges;

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
     * @return ProductRequestOut
     */
    public function withStatus($status)
    {
        $new = clone $this;
        $new->status = $status;

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
     * @return ProductRequestOut
     */
    public function withFormat($format)
    {
        $new = clone $this;
        $new->format = $format;

        return $new;
    }
}

