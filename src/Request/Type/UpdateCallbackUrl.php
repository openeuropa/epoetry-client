<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class UpdateCallbackUrl implements RequestInterface
{
    /**
     * @var null|string
     */
    private $callbackUrl;

    /**
     * @var null|string
     */
    private $applicationName;

    /**
     * Constructor
     *
     * @var string $callbackUrl
     * @var string $applicationName
     */
    public function __construct($callbackUrl, $applicationName)
    {
        $this->callbackUrl = $callbackUrl;
        $this->applicationName = $applicationName;
    }

    /**
     * @param string $callbackUrl
     * @return $this
     */
    public function setCallbackUrl(string $callbackUrl) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrl
    {
        $this->callbackUrl = $callbackUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCallbackUrl() : ?string
    {
        return $this->callbackUrl;
    }

    /**
     * @return bool
     */
    public function hasCallbackUrl() : bool
    {
        return !empty($this->callbackUrl);
    }

    /**
     * @param string $applicationName
     * @return $this
     */
    public function setApplicationName(string $applicationName) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrl
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
}

