<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Middleware;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\Middleware\CasProxyTicketSessionMiddleware;
use OpenEuropa\EPoetry\Tests\Middleware\MockMiddleware;
use OpenEuropa\EPoetry\Middleware\CasProxyTicketMiddleware;
use OpenEuropa\EPoetry\Tests\AbstractTest;
use OpenEuropa\EPoetry\Type\CreateRequests;
use OpenEuropa\EPoetry\Type\LinguisticRequestIn;
use OpenEuropa\EPoetry\Type\RequestGeneralInfoIn;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\Storage\MockArraySessionStorage;

/**
 * @internal
 * @coversNothing
 */
final class MiddlewareTest extends AbstractTest
{
    /**
     * Test exception for missing Proxy Ticket in request.
     */
    public function testNoProxyTicketException()
    {
        // Generate request.
        $generalInfo = new RequestGeneralInfoIn();
        $generalInfo->setTitle('Test');
        $linguisticRequestIn = new LinguisticRequestIn();
        $linguisticRequestIn->setGeneralInfo($generalInfo);
        $createRequests = new CreateRequests();
        $createRequests->setLinguisticRequest($linguisticRequestIn);

        // Generate response.
        $content = file_get_contents(self::FIXTURE_DIR . '/create-requests-response.xml');
        $response = new Response(200, [], $content);
        $this->httpClient->addResponse($response);

        $clientFactory = $this->createClientFactory();
        $session = new Session(new MockArraySessionStorage());
        $middleware = new CasProxyTicketSessionMiddleware($session);
        $clientFactory->addMiddleware($middleware);
        $client = $clientFactory->getClient();

        // Try to perform the request but expect an exception.
        $this->expectExceptionMessage('[epoetry] session has no proxy ticket.');
        $client->createRequests($createRequests);
    }

    /**
     * Test Proxy Ticket in request.
     */
    public function testProxyTicketFromMainMiddleware()
    {
        // Generate request.
        $generalInfo = new RequestGeneralInfoIn();
        $generalInfo->setTitle('Test');
        $linguisticRequestIn = new LinguisticRequestIn();
        $linguisticRequestIn->setGeneralInfo($generalInfo);
        $createRequests = new CreateRequests();
        $createRequests->setLinguisticRequest($linguisticRequestIn);

        // Generate response.
        $content = file_get_contents(self::FIXTURE_DIR . '/create-requests-response.xml');
        $response = new Response(200, [], $content);
        $this->httpClient->addResponse($response);

        $clientFactory = $this->createClientFactory();
        $session = new Session(new MockArraySessionStorage());
        $session->set('cas_pgt', 'DESKTOP_PT-21-9fp9');
        $middleware = new CasProxyTicketSessionMiddleware($session);
        $clientFactory->addMiddleware($middleware);
        $client = $clientFactory->getClient();
        $client->createRequests($createRequests);

        // Perform request.
        $request = $client->debugLastSoapRequest()['request'];

        $this->assertContains('<title>Test</title>', $request['body']);
        $this->assertContains('ecas:ProxyTicket: DESKTOP_PT-21-9fp9', $request['headers'], 'Request XML header malformed, missing proxy ticket.');
    }

    /**
     * Test Proxy Ticket in request using test middleware.
     */
    public function testProxyTicketFromTestMiddleware()
    {
        // Generate request.
        $generalInfo = new RequestGeneralInfoIn();
        $generalInfo->setTitle('Test');
        $linguisticRequestIn = new LinguisticRequestIn();
        $linguisticRequestIn->setGeneralInfo($generalInfo);
        $createRequests = new CreateRequests();
        $createRequests->setLinguisticRequest($linguisticRequestIn);

        // Generate response.
        $content = file_get_contents(self::FIXTURE_DIR . '/create-requests-response.xml');
        $response = new Response(200, [], $content);
        $this->httpClient->addResponse($response);

        $clientFactory = $this->createClientFactory();
        $clientFactory->addMiddleware(new MockMiddleware());
        $client = $clientFactory->getClient();
        $client->createRequests($createRequests);

        // Perform request.
        $request = $client->debugLastSoapRequest()['request'];

        $this->assertContains('<title>Test</title>', $request['body']);
        $this->assertContains('ecas:ProxyTicket: DESKTOP_PT-21-9fp9', $request['headers'], 'Request XML header malformed, missing proxy ticket.');
    }
}
