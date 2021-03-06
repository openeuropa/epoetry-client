<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification\Type;

class DGTNotificationException
{
    /**
     * @var null|string
     */
    protected $errorCode;

    /**
     * @var null|string
     */
    protected $errorDescription;

    /**
     * @var null|string
     */
    protected $message;

    /**
     * @return null|string
     */
    public function getErrorCode(): ?string
    {
        return $this->errorCode;
    }

    /**
     * @return null|string
     */
    public function getErrorDescription(): ?string
    {
        return $this->errorDescription;
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @return bool
     */
    public function hasErrorCode(): bool
    {
        return !empty($this->errorCode);
    }

    /**
     * @return bool
     */
    public function hasErrorDescription(): bool
    {
        return !empty($this->errorDescription);
    }

    /**
     * @return bool
     */
    public function hasMessage(): bool
    {
        return !empty($this->message);
    }

    /**
     * @param string $errorCode
     *
     * @return $this
     */
    public function setErrorCode(string $errorCode): DGTNotificationException
    {
        $this->errorCode = $errorCode;

        return $this;
    }

    /**
     * @param string $errorDescription
     *
     * @return $this
     */
    public function setErrorDescription(string $errorDescription): DGTNotificationException
    {
        $this->errorDescription = $errorDescription;

        return $this;
    }

    /**
     * @param string $message
     *
     * @return $this
     */
    public function setMessage(string $message): DGTNotificationException
    {
        $this->message = $message;

        return $this;
    }
}
