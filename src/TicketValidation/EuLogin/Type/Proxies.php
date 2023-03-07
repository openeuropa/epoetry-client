<?php

namespace OpenEuropa\EPoetry\TicketValidation\EuLogin\Type;

class Proxies
{
    /**
     * @var string
     */
    private $proxy;

    /**
     * @var int
     */
    private $number;

    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @param string $proxy
     * @return Proxies
     */
    public function withProxy($proxy)
    {
        $new = clone $this;
        $new->proxy = $proxy;

        return $new;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return Proxies
     */
    public function withNumber($number)
    {
        $new = clone $this;
        $new->number = $number;

        return $new;
    }
}

