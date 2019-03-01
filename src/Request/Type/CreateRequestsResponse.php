<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CreateRequestsResponse implements ResultInterface
{
    /**
     * @var array|\OpenEuropa\EPoetry\Request\Type\LinguisticRequest[]
     */
    protected $return = [];

    /**
     * @param LinguisticRequest ...$returns
     *
     * @return $this
     */
    public function addReturn(...$returns): CreateRequestsResponse
    {
        $this->return = array_merge($this->return, $returns);

        return $this;
    }

    /**
     * @return array|\OpenEuropa\EPoetry\Request\Type\LinguisticRequest[]
     */
    public function getReturn(): array
    {
        return $this->return;
    }

    /**
     * @return bool
     */
    public function hasReturn(): bool
    {
        return !empty($this->return);
    }

    /**
     * @param LinguisticRequest[] $return
     *
     * @return $this
     */
    public function setReturn(array $return): CreateRequestsResponse
    {
        $this->return = $return;

        return $this;
    }
}
