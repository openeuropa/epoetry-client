<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class CreateRequestsResponse implements ResultInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\LinguisticRequest[]
     */
    protected $return;

    /**
     * @param LinguisticRequest ...$returns
     *
     * @return $this
     */
    public function addReturn(...$returns): CreateRequestsResponse
    {
        foreach ($returns as $return) {
            $this->return[] = $return;
        }

        return $this;
    }

    /**
     * @return null|\OpenEuropa\EPoetry\Type\LinguisticRequest[]
     */
    public function getReturn(): ?array
    {
        return $this->return;
    }

    /**
     * @return bool
     */
    public function hasReturn(): bool
    {
        if (\is_array($this->return)) {
            return !empty($this->return);
        }

        return isset($this->return);
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
