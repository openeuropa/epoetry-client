<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use Phpro\SoapClient\Type\RequestInterface;

/**
 * Return an instance of this class from EvaluateRequestCommand evaluated file.
 */
final class EvaluateRequestReturn
{

    private RequestInterface $request;

    private string $method;

    /**
     * @param \Phpro\SoapClient\Type\RequestInterface $request
     * @param string $method
     */
    public function __construct(RequestInterface $request, string $method)
    {
        $this->request = $request;
        $this->method = $method;
    }

    /**
     * @return \Phpro\SoapClient\Type\RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }
}
