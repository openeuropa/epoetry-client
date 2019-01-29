<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\Tests\Middleware\MockMiddleware;
use OpenEuropa\EPoetry\Type\CreateRequests;
use OpenEuropa\EPoetry\Type\LinguisticRequestIn;
use OpenEuropa\EPoetry\Type\RequestGeneralInfoIn;

/**
 * @internal
 * @coversNothing
 */
final class MiddlewareTest extends AbstractTest
{
    /**
     * Test Proxy Ticket in request.
     */
    public function testResponseParsing()
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

        $request = $client->debugLastSoapRequest()['request'];

        $this->assertContains('<title>Test</title>', $request['body']);
        $this->assertContains('ecas:ProxyTicket: DESKTOP_PT-21-9fp9', $request['headers'], 'Request XML header malformed, missing proxy ticket.');
    }
}
