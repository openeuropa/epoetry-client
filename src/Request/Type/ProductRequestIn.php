<?php

namespace OpenEuropa\EPoetry\Request\Type;

class ProductRequestIn
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
     * @var bool
     */
    private $trackChanges;

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return ProductRequestIn
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
     * @return ProductRequestIn
     */
    public function withRequestedDeadline($requestedDeadline)
    {
        $new = clone $this;
        $new->requestedDeadline = $requestedDeadline;

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
     * @return ProductRequestIn
     */
    public function withTrackChanges($trackChanges)
    {
        $new = clone $this;
        $new->trackChanges = $trackChanges;

        return $new;
    }
}

