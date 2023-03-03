<?php

namespace OpenEuropa\EPoetry\TicketValidation\Type;

class LoginRequestSuccessType
{
    /**
     * @var string
     */
    private $loginRequestId;

    /**
     * @var string
     */
    private $loginResponseId;

    /**
     * @var string
     */
    private $privateServiceTicket;

    /**
     * @return string
     */
    public function getLoginRequestId()
    {
        return $this->loginRequestId;
    }

    /**
     * @param string $loginRequestId
     * @return LoginRequestSuccessType
     */
    public function withLoginRequestId($loginRequestId)
    {
        $new = clone $this;
        $new->loginRequestId = $loginRequestId;

        return $new;
    }

    /**
     * @return string
     */
    public function getLoginResponseId()
    {
        return $this->loginResponseId;
    }

    /**
     * @param string $loginResponseId
     * @return LoginRequestSuccessType
     */
    public function withLoginResponseId($loginResponseId)
    {
        $new = clone $this;
        $new->loginResponseId = $loginResponseId;

        return $new;
    }

    /**
     * @return string
     */
    public function getPrivateServiceTicket()
    {
        return $this->privateServiceTicket;
    }

    /**
     * @param string $privateServiceTicket
     * @return LoginRequestSuccessType
     */
    public function withPrivateServiceTicket($privateServiceTicket)
    {
        $new = clone $this;
        $new->privateServiceTicket = $privateServiceTicket;

        return $new;
    }
}

