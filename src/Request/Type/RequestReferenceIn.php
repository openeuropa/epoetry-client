<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

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
        return !empty($this->id);
    }

    /**
     * @return bool
     */
    public function hasInternalTechnicalId(): bool
    {
        return !empty($this->internalTechnicalId);
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
