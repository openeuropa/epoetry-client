<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Request\Type;

use Phpro\SoapClient\Type\ResultInterface;

class FindLinguisticRequestResponse implements ResultInterface
{
    /**
     * @var null|\OpenEuropa\EPoetry\Request\Type\LinguisticRequest
     */
    protected $return;

    /**
     * @return null|\OpenEuropa\EPoetry\Request\Type\LinguisticRequest
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
     * @param \OpenEuropa\EPoetry\Request\Type\LinguisticRequest $return
     *
     * @return $this
     */
    public function setReturn($return): FindLinguisticRequestResponse
    {
        $this->return = $return;

        return $this;
    }
}
