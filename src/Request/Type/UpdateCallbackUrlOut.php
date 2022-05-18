<?php

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class UpdateCallbackUrlOut implements ResultInterface
{
    /**
     * @var bool
     */
    private $success;

    /**
     * @var string
     */
    private $oldCallbackUrl;

    /**
     * @var string
     */
    private $newCallbackUrl;

    /**
     * @var string
     */
    private $application;

    /**
     * @var string
     */
    private $message;

    /**
     * @return bool
     */
    public function getSuccess()
    {
        return $this->success;
    }

    /**
     * @param bool $success
     * @return UpdateCallbackUrlOut
     */
    public function withSuccess($success)
    {
        $new = clone $this;
        $new->success = $success;

        return $new;
    }

    /**
     * @return string
     */
    public function getOldCallbackUrl()
    {
        return $this->oldCallbackUrl;
    }

    /**
     * @param string $oldCallbackUrl
     * @return UpdateCallbackUrlOut
     */
    public function withOldCallbackUrl($oldCallbackUrl)
    {
        $new = clone $this;
        $new->oldCallbackUrl = $oldCallbackUrl;

        return $new;
    }

    /**
     * @return string
     */
    public function getNewCallbackUrl()
    {
        return $this->newCallbackUrl;
    }

    /**
     * @param string $newCallbackUrl
     * @return UpdateCallbackUrlOut
     */
    public function withNewCallbackUrl($newCallbackUrl)
    {
        $new = clone $this;
        $new->newCallbackUrl = $newCallbackUrl;

        return $new;
    }

    /**
     * @return string
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * @param string $application
     * @return UpdateCallbackUrlOut
     */
    public function withApplication($application)
    {
        $new = clone $this;
        $new->application = $application;

        return $new;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return UpdateCallbackUrlOut
     */
    public function withMessage($message)
    {
        $new = clone $this;
        $new->message = $message;

        return $new;
    }
}

