<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Requests;

use GuzzleHttp\Psr7\Response;
use OpenEuropa\EPoetry\Serializer\RequestsSerializer;
use OpenEuropa\EPoetry\Type\CreateRequests;
use OpenEuropa\EPoetry\Type\CreateRequestsResponse;

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

        foreach ($expectations['assertions'] as $type => $expectationsTypes) {
            foreach ($expectationsTypes as $expression => $expectation) {
                $this->{$type}(
                    $expectation,
                    $this->expressionLanguage->evaluate(
                        $expression,
                        $values
                    )
                );
            }
        }
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
        $response = $client->createRequests(
            RequestsSerializer::fromArray(
                $input['request'],
                CreateRequests::class
            )
        );

        // TODO: convert in Expression Language
        //
        // assertInstanceOf:
        //   response: \\OpenEuropa\\EPoetry\\Type\\CreateRequestsResponse
        //
        $this->assertInstanceOf(CreateRequestsResponse::class, $response);

        $values = [
            'response' => $response,
        ];

        foreach ($expectations['assertions'] as $type => $expectationsTypes) {
            foreach ($expectationsTypes as $expression => $expectation) {
                $this->{$type}(
                    $expectation,
                    $this->expressionLanguage->evaluate(
                        $expression,
                        $values
                    )
                );
            }
        }
    }
}
