<?php

namespace OpenEuropa\EPoetry\Type;

use Phpro\SoapClient\Type\RequestInterface;

class ProductRequest implements RequestInterface
{

    /**
     * @var \OpenEuropa\EPoetry\Type\Language
     */
    private $language;

    /**
     * @var \DateTime
     */
    private $requestedDeadline;

    /**
     * @var \DateTime
     */
    private $acceptedDeadline;

    /**
     * @var string
     */
    private $formatCode;

    /**
     * @var string
     */
    private $statusCode;

    /**
     * @var bool
     */
    private $trackChanges;

    /**
     * @var string
     */
    private $internalProductReference;

    /**
     * Constructor
     *
     * @var \OpenEuropa\EPoetry\Type\Language $language
     * @var \DateTime $requestedDeadline
     * @var \DateTime $acceptedDeadline
     * @var string $formatCode
     * @var string $statusCode
     * @var bool $trackChanges
     * @var string $internalProductReference
     */
    public function __construct(\OpenEuropa\EPoetry\Type\Language $language, \DateTime $requestedDeadline, \DateTime $acceptedDeadline, string $formatCode, string $statusCode, bool $trackChanges, string $internalProductReference)
    {
        $this->language = $language;
        $this->requestedDeadline = $requestedDeadline;
        $this->acceptedDeadline = $acceptedDeadline;
        $this->formatCode = $formatCode;
        $this->statusCode = $statusCode;
        $this->trackChanges = $trackChanges;
        $this->internalProductReference = $internalProductReference;
    }

    /**
     * @return \OpenEuropa\EPoetry\Type\Language
     */
    public function getLanguage() : \OpenEuropa\EPoetry\Type\Language
    {
        return $this->language;
    }

    /**
     * @param \OpenEuropa\EPoetry\Type\Language $language
     * @return $this
     */
    public function setLanguage($language) : \OpenEuropa\EPoetry\Type\ProductRequest
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getRequestedDeadline() : \DateTime
    {
        return $this->requestedDeadline;
    }

    /**
     * @param \DateTime $requestedDeadline
     * @return $this
     */
    public function setRequestedDeadline($requestedDeadline) : \OpenEuropa\EPoetry\Type\ProductRequest
    {
        $this->requestedDeadline = $requestedDeadline;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAcceptedDeadline() : \DateTime
    {
        return $this->acceptedDeadline;
    }

    /**
     * @param \DateTime $acceptedDeadline
     * @return $this
     */
    public function setAcceptedDeadline($acceptedDeadline) : \OpenEuropa\EPoetry\Type\ProductRequest
    {
        $this->acceptedDeadline = $acceptedDeadline;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormatCode() : string
    {
        return $this->formatCode;
    }

    /**
     * @param string $formatCode
     * @return $this
     */
    public function setFormatCode(string $formatCode) : \OpenEuropa\EPoetry\Type\ProductRequest
    {
        $this->formatCode = $formatCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCode() : string
    {
        return $this->statusCode;
    }

    /**
     * @param string $statusCode
     * @return $this
     */
    public function setStatusCode(string $statusCode) : \OpenEuropa\EPoetry\Type\ProductRequest
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return bool
     */
    public function isTrackChanges() : bool
    {
        return $this->trackChanges;
    }

    /**
     * @param bool $trackChanges
     * @return $this
     */
    public function setTrackChanges(bool $trackChanges) : \OpenEuropa\EPoetry\Type\ProductRequest
    {
        $this->trackChanges = $trackChanges;
        return $this;
    }

    /**
     * @return string
     */
    public function getInternalProductReference() : string
    {
        return $this->internalProductReference;
    }

    /**
     * @param string $internalProductReference
     * @return $this
     */
    public function setInternalProductReference(string $internalProductReference) : \OpenEuropa\EPoetry\Type\ProductRequest
    {
        $this->internalProductReference = $internalProductReference;
        return $this;
    }
}
