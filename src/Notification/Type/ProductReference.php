<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class ProductReference
{
    /**
     * @var null|\OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    private $requestReference;

    /**
     * @var null|string
     */
    private $language;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference
     * @var string $language
     */
    public function __construct(\OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference, string $language)
    {
        $this->requestReference = $requestReference;
        $this->language = $language;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference
     * @return $this
     */
    public function setRequestReference($requestReference) : \OpenEuropa\EPoetry\Notification\Type\ProductReference
    {
        $this->requestReference = $requestReference;
        return $this;
    }

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\RequestReference|null
     */
    public function getRequestReference() : ?\OpenEuropa\EPoetry\Notification\Type\RequestReference
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
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language) : \OpenEuropa\EPoetry\Notification\Type\ProductReference
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
}

