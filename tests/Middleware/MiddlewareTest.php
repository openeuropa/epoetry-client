<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Middleware;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\Middleware\CasProxyTicketMiddleware;
use OpenEuropa\EPoetry\Tests\Request\AbstractMiddlewareTest;
use OpenEuropa\EPoetry\Request\Type\CreateRequests;

/**
 * @internal
 * @coversNothing
 */
final class MiddlewareTest extends AbstractMiddlewareTest
{
    /**
     * @return mixed
     */
    public function proxyTicketCases(): array
    {
        return $this->getFixture('proxy-ticket-test.yml');
    }

    /**
     * Test Proxy Ticket in request.
     *
     * @dataProvider proxyTicketCases
     *
     * @param string $pgt
     * @param array $expectations
     */
    public function testProxyTicket(string $pgt, array $expectations)
    {
        $expectations += ['exceptions' => []];

        // Generate response.
        $response = new Response(200, [], $this->getXml());
        $this->httpClient->addResponse($response);

        $clientFactory = $this->createClientFactory();
        $casProxyTicketService = new ProxyTicketService($pgt);

        $middleware = new CasProxyTicketMiddleware($casProxyTicketService);
        $clientFactory->addMiddleware($middleware);
        $client = $clientFactory->getRequestClient();

        foreach ($expectations['exceptions'] as $expression) {
            $this->expectExceptionMessage($expression);
        }

        $client->createRequests(new CreateRequests());

        $values['request'] = $client->debugLastSoapRequest()['request'];

        $this->assertExpressionLanguageExpressions(
            $expectations['assertions'],
            $values
        );
    }
}
