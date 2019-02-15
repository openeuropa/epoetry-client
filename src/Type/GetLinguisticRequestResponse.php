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
    public function getReturn(): ?\OpenEuropa\EPoetry\Type\LinguisticRequest
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
