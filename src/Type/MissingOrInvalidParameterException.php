<?php

namespace OpenEuropa\EPoetry\Type;

class MissingOrInvalidParameterException
{

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $uid;

    /**
     * @return string
     */
    public function getMessage() : string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message) : \OpenEuropa\EPoetry\Type\MissingOrInvalidParameterException
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getUid() : string
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     * @return $this
     */
    public function setUid(string $uid) : \OpenEuropa\EPoetry\Type\MissingOrInvalidParameterException
    {
        $this->uid = $uid;
        return $this;
    }
}
