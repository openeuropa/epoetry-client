<?php

namespace OpenEuropa\EPoetry\Request\Type;

class UpdateCallbackUrlOut
{
    /**
     * @var bool
     */
    private $success;

    /**
     * @var null | string
     */
    private $oldCallbackUrl = null;

    /**
     * @var null | string
     */
    private $newCallbackUrl = null;

    /**
     * @var null | string
     */
    private $application = null;

    /**
     * @var null | string
     */
    private $message = null;

    /**
     * @param bool $success
     * @return $this
     */
    public function setSuccess(bool $success): static
    {
        $this->success = $success;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->success;
    }

    /**
     * @return bool
     */
    public function hasSuccess(): bool
    {
        return !empty($this->success);
    }

    /**
     * @param null | string $oldCallbackUrl
     * @return $this
     */
    public function setOldCallbackUrl(?string $oldCallbackUrl): static
    {
        $this->oldCallbackUrl = $oldCallbackUrl;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getOldCallbackUrl(): ?string
    {
        return $this->oldCallbackUrl;
    }

    /**
     * @return bool
     */
    public function hasOldCallbackUrl(): bool
    {
        return !empty($this->oldCallbackUrl);
    }

    /**
     * @param null | string $newCallbackUrl
     * @return $this
     */
    public function setNewCallbackUrl(?string $newCallbackUrl): static
    {
        $this->newCallbackUrl = $newCallbackUrl;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getNewCallbackUrl(): ?string
    {
        return $this->newCallbackUrl;
    }

    /**
     * @return bool
     */
    public function hasNewCallbackUrl(): bool
    {
        return !empty($this->newCallbackUrl);
    }

    /**
     * @param null | string $application
     * @return $this
     */
    public function setApplication(?string $application): static
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getApplication(): ?string
    {
        return $this->application;
    }

    /**
     * @return bool
     */
    public function hasApplication(): bool
    {
        return !empty($this->application);
    }

    /**
     * @param null | string $message
     * @return $this
     */
    public function setMessage(?string $message): static
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return null | string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function hasMessage(): bool
    {
        return !empty($this->message);
    }
}

