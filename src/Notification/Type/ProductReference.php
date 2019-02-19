<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Notification\Type;

class ProductReference
{
    /**
     * @var null|int
     */
    protected $id;

    /**
     * @var null|string
     */
    protected $internalProductReference;

    /**
     * @var null|\OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    protected $parentRequest;

    /**
     * @var null|\OpenEuropa\EPoetry\Notification\Type\Language
     */
    protected $targetLanguage;

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return null|string
     */
    public function getInternalProductReference(): ?string
    {
        return $this->internalProductReference;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Notification\Type\RequestReference
     */
    public function getParentRequest(): ?\OpenEuropa\EPoetry\Notification\Type\RequestReference
    {
        return $this->parentRequest;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Notification\Type\Language
     */
    public function getTargetLanguage(): ?\OpenEuropa\EPoetry\Notification\Type\Language
    {
        return $this->targetLanguage;
    }

    /**
     * @return bool
     */
    public function hasId(): bool
    {
        if (\is_array($this->id)) {
            return !empty($this->id);
        }

        return isset($this->id);
    }

    /**
     * @return bool
     */
    public function hasInternalProductReference(): bool
    {
        if (\is_array($this->internalProductReference)) {
            return !empty($this->internalProductReference);
        }

        return isset($this->internalProductReference);
    }

    /**
     * @return bool
     */
    public function hasParentRequest(): bool
    {
        if (\is_array($this->parentRequest)) {
            return !empty($this->parentRequest);
        }

        return isset($this->parentRequest);
    }

    /**
     * @return bool
     */
    public function hasTargetLanguage(): bool
    {
        if (\is_array($this->targetLanguage)) {
            return !empty($this->targetLanguage);
        }

        return isset($this->targetLanguage);
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): ProductReference
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $internalProductReference
     *
     * @return $this
     */
    public function setInternalProductReference(string $internalProductReference): ProductReference
    {
        $this->internalProductReference = $internalProductReference;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\RequestReference $parentRequest
     *
     * @return $this
     */
    public function setParentRequest($parentRequest): ProductReference
    {
        $this->parentRequest = $parentRequest;

        return $this;
    }

    /**
     * @param \OpenEuropa\EPoetry\Notification\Type\Language $targetLanguage
     *
     * @return $this
     */
    public function setTargetLanguage($targetLanguage): ProductReference
    {
        $this->targetLanguage = $targetLanguage;

        return $this;
    }
}
