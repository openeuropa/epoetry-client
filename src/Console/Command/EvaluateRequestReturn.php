<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Console\Command;

use Phpro\SoapClient\Type\ResultInterface;
use Phpro\SoapClient\Type\RequestInterface;

/**
 * Return an instance of this class from EvaluateRequestCommand evaluated file.
 */
final class EvaluateRequestReturn
{

    private RequestInterface $request;

    private ResultInterface $response;

    /**
     * @param \Phpro\SoapClient\Type\RequestInterface $request
     * @param \Phpro\SoapClient\Type\ResultInterface $result
     */
    public function __construct(RequestInterface $request, ResultInterface $result)
    {
        $this->request = $request;
        $this->response = $result;
    }

    /**
     * @return \Phpro\SoapClient\Type\RequestInterface
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @return \Phpro\SoapClient\Type\ResultInterface
     */
    public function getResponse(): ResultInterface
    {
        return $this->response;
    }
}
