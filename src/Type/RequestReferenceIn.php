<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

class RequestReferenceIn
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $internalTechnicalId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getInternalTechnicalId(): string
    {
        return $this->internalTechnicalId;
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
