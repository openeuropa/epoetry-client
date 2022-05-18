<?php

namespace OpenEuropa\EPoetry\Notification\Type;

class ProductReference
{
    /**
     * @var \OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    private $requestReference;

    /**
     * @var string
     */
    private $language;

    /**
     * @return \OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    public function getRequestReference()
    {
        return $this->requestReference;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\RequestReference $requestReference
     * @return ProductReference
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
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     * @return ProductReference
     */
    public function withLanguage($language)
    {
        $new = clone $this;
        $new->language = $language;

        return $new;
    }
}

