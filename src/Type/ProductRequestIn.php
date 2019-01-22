<?php

namespace OpenEuropa\EPoetry\Type;

class ProductRequestIn
{

    /**
     * @var \OpenEuropa\EPoetry\Type\LanguageIn
     */
    private $language;

    /**
     * @var \DateTime
     */
    private $requestedDeadline;

    /**
     * @var string
     */
    private $internalProductReference;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @return \OpenEuropa\EPoetry\Type\LanguageIn
     */
    public function getLanguage() : \OpenEuropa\EPoetry\Type\LanguageIn
    {
        return $this->language;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\LanguageIn $language
     * @return $this
     */
    public function setLanguage($language) : \OpenEuropa\EPoetry\Type\ProductRequestIn
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRequestedDeadline() : \DateTime
    {
        return $this->requestedDeadline;
    }

    /**
     * @param \DateTime $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline) : \OpenEuropa\EPoetry\Type\ProductRequestIn
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalProductReference() : string
    {
        return $this->internalProductReference;
    }

    /**
     * @param string $internalProductReference
     * @return $this
     */
    public function setInternalProductReference(string $internalProductReference) : \OpenEuropa\EPoetry\Type\ProductRequestIn
    {
        $this->internalProductReference = $internalProductReference;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTrackChanges() : bool
    {
        return $this->trackChanges;
    }

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges) : \OpenEuropa\EPoetry\Type\ProductRequestIn
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }


}

