<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test UpdateCallbackUrlResponse class.
 */
final class UpdateCallbackUrlResponseTest extends BaseRequestTest
{
    /**
     * Tests UpdateCallbackUrlResponse decoding.
     *
     * @dataProvider dataProviderUpdateCallbackUrlResponse
     */
    public function testRequestResponse($response, $expectations): void
    {
        $xml = file_get_contents(__DIR__ . '/fixtures/' . $response);
        $response = $this->driver->decode('updateCallbackUrl', new SoapResponse($xml));
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $response]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderUpdateCallbackUrlResponse(): array
    {
        return $this->getFixture('updateCallbackUrlResponse.yaml', '/Request');
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        // We don't have real example. Use what we have.
        $xml = file_get_contents(__DIR__ . '/fixtures/createLinguisticRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('updateCallbackUrl', new SoapResponse($xml));
    }
}
