<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class ProxySuccessType
{
    /**
     * @var string
     */
    private $proxyTicket;

    /**
     * @return string
     */
    public function getProxyTicket()
    {
        return $this->proxyTicket;
    }

    /**
     * @param string $proxyTicket
     * @return ProxySuccessType
     */
    public function withProxyTicket($proxyTicket)
    {
        $new = clone $this;
        $new->proxyTicket = $proxyTicket;

        return $new;
    }
}

