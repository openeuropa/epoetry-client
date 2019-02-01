<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Middleware;

use Http\Promise\Promise;
use Phpro\SoapClient\Middleware\Middleware;
use Psr\Http\Message\RequestInterface;

class MockMiddleware extends Middleware
{
    public function beforeRequest(callable $next, RequestInterface $request): Promise
    {
        // Add Proxy Ticket.
        $request = $request->withHeader('ecas:ProxyTicket', 'DESKTOP_PT-21-9fp9');

        return $next($request);
    }

    public function getName(): string
    {
        return 'mock_middleware';
    }
}
