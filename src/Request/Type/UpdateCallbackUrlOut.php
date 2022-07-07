<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class UpdateCallbackUrlOut implements ResultInterface
{
    /**
     * @var null|bool
     */
    private $success;

    /**
     * @var null|string
     */
    private $oldCallbackUrl;

    /**
     * @var null|string
     */
    private $newCallbackUrl;

    /**
     * @var null|string
     */
    private $application;

    /**
     * @var null|string
     */
    private $message;

    /**
     * @param bool $success
     * @return $this
     */
    public function setSuccess(bool $success) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function isSuccess() : ?bool
    {
        return $this->success;
    }

    /**
     * @return bool
     */
    public function hasSuccess() : bool
    {
        return !empty($this->success);
    }

    /**
     * @param string $oldCallbackUrl
     * @return $this
     */
    public function setOldCallbackUrl(string $oldCallbackUrl) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
    {
        $this->oldCallbackUrl = $oldCallbackUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getOldCallbackUrl() : ?string
    {
        return $this->oldCallbackUrl;
    }

    /**
     * @return bool
     */
    public function hasOldCallbackUrl() : bool
    {
        return !empty($this->oldCallbackUrl);
    }

    /**
     * @param string $newCallbackUrl
     * @return $this
     */
    public function setNewCallbackUrl(string $newCallbackUrl) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
    {
        $this->newCallbackUrl = $newCallbackUrl;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNewCallbackUrl() : ?string
    {
        return $this->newCallbackUrl;
    }

    /**
     * @return bool
     */
    public function hasNewCallbackUrl() : bool
    {
        return !empty($this->newCallbackUrl);
    }

    /**
     * @param string $application
     * @return $this
     */
    public function setApplication(string $application) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApplication() : ?string
    {
        return $this->application;
    }

    /**
     * @return bool
     */
    public function hasApplication() : bool
    {
        return !empty($this->application);
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message) : \OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlOut
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMessage() : ?string
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function hasMessage() : bool
    {
        return !empty($this->message);
    }
}

