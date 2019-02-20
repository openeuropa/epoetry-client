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
     * @return mixed
     */
    public function requestSendingCases()
    {
        return $this->getFixture('request-send-test.yml');
    }

    /**
     * Data provider.
     *
     * @return mixed
     */
    public function responseParsingCases()
    {
        return $this->getFixture('response-parse-test.yml');
    }

    /**
     * Test a SOAP request.
     *
     * @dataProvider requestSendingCases
     *
     * @param mixed $input
     */
    public function testRequestSending(array $input, array $expectations)
    {
        $createRequests = RequestsSerializer::fromArray(
            $input['request'],
            CreateRequests::class
        );

        $response = new Response(200, [], $input['response']);
        $this->httpClient->addResponse($response);

        $client = $this->createClientFactory()->getClient();
        $client->createRequests($createRequests);

        $values = [
            'request' => $client->debugLastSoapRequest()['request'],
        ];

        $this->assertExpressionLanguageExpressions($expectations['assertions']);
    }

    /**
     * Test parsing a SOAP response.
     *
     * @dataProvider responseParsingCases
     *
     * @param mixed $input
     * @param mixed $expectations
     */
    public function testResponseParsing($input, $expectations)
    {
        $response = new Response(200, [], $input['response']);
        $this->httpClient->addResponse($response);

        $client = $this->createClientFactory()->getClient();

        $values = [
            'response' => $client->createRequests(
                RequestsSerializer::fromArray(
                    $input['request'],
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
