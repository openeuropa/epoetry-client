<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\Middleware\CasProxyTicketSessionMiddleware;
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
     *
     * @param string $ticket
     * @param array $expectations
     */
    public function testProxyTicket(string $ticket, array $expectations)
    {
        $expectations += ['exceptions' => []];

        // Generate response.
        $response = new Response(200, [], $this->getXml());
        $this->httpClient->addResponse($response);

        $clientFactory = $this->createClientFactory();
        $session = new Session(new MockArraySessionStorage());

        $values = [
            'session' => $session,
        ];

        if ($ticket !== '') {
            $session->set('cas_pgt', $ticket);
        }

        $middleware = new CasProxyTicketSessionMiddleware($session);
        $clientFactory->addMiddleware($middleware);
        $client = $clientFactory->getClient();

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
