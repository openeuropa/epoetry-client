<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test CreateLinguisticRequestResponse service.
 */
final class CreateLinguisticRequestResponseTest extends BaseRequestTest
{
    /**
     * Tests CreateLinguisticRequestResponse decoding.
     *
     * @dataProvider dataProviderRequestResponse
     */
    public function testRequestResponse($response, $expectations): void
    {
        $xml = file_get_contents(__DIR__ . '/fixtures/' . $response);
        $response = $this->driver->decode('createLinguisticRequest', new SoapResponse($xml));
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
        return $this->getFixture('createLinguisticRequestResponse.yaml', '/Request');
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        $xml = file_get_contents(__DIR__.'/fixtures/createLinguisticRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('createLinguisticRequest', new SoapResponse($xml));
    }
}
