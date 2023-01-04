<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test CreateNewVersionResponse service.
 */
final class CreateNewVersionResponseTest extends BaseRequestTest
{
    /**
     * Tests CreateNewVersionResponse decoding.
     *
     * @dataProvider dataProviderRequestResponse
     */
    public function testRequestResponse($response, $expectations): void
    {
        $xml = file_get_contents(__DIR__ . '/fixtures/' . $response);
        $response = $this->driver->decode('createNewVersion', new SoapResponse($xml));
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $response]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderRequestResponse(): array
    {
        return $this->getFixture('createNewVersionResponse.yaml', '/Request');
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        // Use response error as in createLinguisticRequestResponse since we don't have another example.
        $xml = file_get_contents(__DIR__ . '/fixtures/createLinguisticRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('createNewVersion', new SoapResponse($xml));
    }
}