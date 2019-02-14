<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\Serializer\RequestsSerializer;
use OpenEuropa\EPoetry\Type\CreateRequests;

/**
 * @internal
 * @coversNothing
 */
final class RequestTest extends AbstractRequestTest
{
    /**
     * Data provider.
     *
     * @return array
     */
    public function requestSendingCases(): array
    {
        return $this->getFixture('request-send-test.yml');
    }

    /**
     * Data provider.
     *
     * @return array
     */
    public function responseParsingCases(): array
    {
        return $this->getFixture('response-parse-test.yml');
    }

    /**
     * Data provider.
     *
     * @return mixed
     */
    public function responseParsingCases()
    {
        return $this->getFixture('response-parsing.yml');
    }

    /**
     * Test a SOAP request.
     *
     * @param string $response
     * @param array $request
     * @param array $expectations
     *
     * @dataProvider requestSendingCases
     *
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     */
    public function testRequestSending(string $response, array $request, array $expectations): void
    {
        $createRequests = RequestsSerializer::fromArray(
            $request,
            CreateRequests::class
        );

        $response = new Response(200, [], $this->getFixtureContent($response));
        $this->httpClient->addResponse($response);

        $client = $this->createClientFactory()->getClient();
        $client->createRequests($createRequests);

        $values = [
            'request' => $client->debugLastSoapRequest()['request'],
        ];

        $this->assertExpressionLanguageExpressions(
            $expectations['assertions'],
            $values
        );
    }

    /**
     * Test parsing a SOAP response.
     *
     * @param string $response
     * @param array $request
     * @param mixed $expectations
     *
     * @throws \Symfony\Component\Serializer\Exception\ExceptionInterface
     *
     * @dataProvider responseParsingCases
     */
    public function testResponseParsing(string $response, array $request, $expectations): void
    {
        $response = new Response(200, [], $this->getFixtureContent($response));
        $this->httpClient->addResponse($response);
        
        $client = $this->createClientFactory()->getClient();

        $values = [
            'response' => $client->createRequests(
                RequestsSerializer::fromArray(
                    $request,
                    CreateRequests::class
                )
            ),
        ];

        $this->assertExpressionLanguageExpressions(
            $expectations['assertions'],
            $values
        );
    }
}
