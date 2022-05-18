<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\RequestInterface;

class UpdateCallbackUrl implements RequestInterface
{
    /**
     * @var string
     */
    private $callbackUrl;

    /**
     * @var string
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
     * @return string
     */
    public function getCallbackUrl()
    {
        return $this->callbackUrl;
    }

    /**
     * @param string $callbackUrl
     * @return UpdateCallbackUrl
     */
    public function withCallbackUrl($callbackUrl)
    {
        $new = clone $this;
        $new->callbackUrl = $callbackUrl;

        return $new;
    }

    /**
     * @return string
     */
    public function getApplicationName()
    {
        return $this->applicationName;
    }

    /**
     * @param string $applicationName
     * @return UpdateCallbackUrl
     */
    public function withApplicationName($applicationName)
    {
        $new = clone $this;
        $new->applicationName = $applicationName;

        return $new;
    }
}

