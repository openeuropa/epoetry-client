<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\ResultInterface;

class GetLinguisticRequestResponse implements ResultInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Type\LinguisticRequest
     */
    protected $return;

    /**
     * @return null|\OpenEuropa\EPoetry\Type\LinguisticRequest
     */
    public function getReturn(): ?LinguisticRequest
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
     * @param \OpenEuropa\EPoetry\Type\LinguisticRequest $return
     *
     * @return $this
     */
    public function setReturn($return): GetLinguisticRequestResponse
    {
        $this->return = $return;

        return $this;
    }
}
