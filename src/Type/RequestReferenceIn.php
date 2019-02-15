<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class RequestReferenceIn
{
    /**
     * @var null|int
     */
    protected $id;

    /**
     * @var null|string
     */
    protected $internalTechnicalId;

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
    public function getInternalTechnicalId(): ?string
    {
        return $this->internalTechnicalId;
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
    public function hasInternalTechnicalId(): bool
    {
        if (\is_array($this->internalTechnicalId)) {
            return !empty($this->internalTechnicalId);
        }

        return isset($this->internalTechnicalId);
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): RequestReferenceIn
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $internalTechnicalId
     *
     * @return $this
     */
    public function setInternalTechnicalId(string $internalTechnicalId): RequestReferenceIn
    {
        $this->internalTechnicalId = $internalTechnicalId;

        return $this;
    }
}
