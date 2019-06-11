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
    public function getParentRequest(): ?RequestReference
    {
        return $this->parentRequest;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Notification\Type\Language
     */
    public function getTargetLanguage(): ?Language
    {
        return $this->targetLanguage;
    }

    /**
     * @return bool
     */
    public function hasId(): bool
    {
        return !empty($this->id);
    }

    /**
     * @return bool
     */
    public function hasInternalProductReference(): bool
    {
        return !empty($this->internalProductReference);
    }

    /**
     * @return bool
     */
    public function hasParentRequest(): bool
    {
        return !empty($this->parentRequest);
    }

    /**
     * @return bool
     */
    public function hasTargetLanguage(): bool
    {
        return !empty($this->targetLanguage);
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
    public function setTargetLanguage(Language $targetLanguage): ProductReference
    {
        $this->targetLanguage = $targetLanguage;

        return $this;
    }
}
