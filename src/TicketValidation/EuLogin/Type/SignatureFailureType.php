<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class SignatureFailureType
{
    /**
     * @var string
     */
    private $_;

    /**
     * @var string
     */
    private $code;

    /**
     * @return string
     */
    public function get_()
    {
        return $this->_;
    }

    /**
     * @param string $_
     * @return SignatureFailureType
     */
    public function with_($_)
    {
        $new = clone $this;
        $new->_ = $_;

        return $new;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return SignatureFailureType
     */
    public function withCode($code)
    {
        $new = clone $this;
        $new->code = $code;

        return $new;
    }
}

