<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Middleware;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\Middleware\CasProxyTicketSessionMiddleware;
use OpenEuropa\EPoetry\Tests\Requests\AbstractMiddlewareTest;
use OpenEuropa\EPoetry\Type\CreateRequests;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

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
     */
    public function testProxyTicket(array $input, array $expectations)
    {
        $input += ['session' => []];
        $expectations += ['exceptions' => []];

        // Generate response.
        $response = new Response(200, [], $input['xml']);
        $this->httpClient->addResponse($response);

        $clientFactory = $this->createClientFactory();
        $session = new Session(new MockArraySessionStorage());

        $values = [
            'session' => $session,
        ];

        foreach ($input['session'] as $expression) {
            $this->expressionLanguage->evaluate($expression, $values);
        }

        $middleware = new CasProxyTicketSessionMiddleware($session);
        $clientFactory->addMiddleware($middleware);
        $client = $clientFactory->getClient();

        foreach ($expectations['exceptions'] as $expression) {
            $this->expectExceptionMessage($expression);
        }

        $client->createRequests(new CreateRequests());

        $values['request'] = $client->debugLastSoapRequest()['request'];

        foreach ($expectations['assertions'] as $expression) {
            $this->assertTrue(
                $this->expressionLanguage->evaluate(
                    $expression,
                    $values
                ),
                sprintf('The expression [%s] failed to evaluate to true.', $expression)
            );
        }
    }
}
