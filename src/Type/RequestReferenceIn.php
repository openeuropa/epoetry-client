<?php

namespace OpenEuropa\EPoetry\Type;

class RequestReferenceIn
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $internalTechnicalId;

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id) : \OpenEuropa\EPoetry\Type\RequestReferenceIn
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalTechnicalId() : string
    {
        return $this->internalTechnicalId;
    }

    /**
     * @param string $internalTechnicalId
     * @return $this
     */
    public function setInternalTechnicalId(string $internalTechnicalId) : \OpenEuropa\EPoetry\Type\RequestReferenceIn
    {
        $this->internalTechnicalId = $internalTechnicalId;
        return $this;
    }


}

