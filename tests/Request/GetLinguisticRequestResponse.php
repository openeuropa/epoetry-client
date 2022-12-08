<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test GetLinguisticRequestResponse service.
 */
final class GetLinguisticRequestResponse extends BaseRequestTest
{
    /**
     * Tests GetLinguisticRequestResponse decoding.
     *
     * @dataProvider dataProviderRequestResponse
     */
    public function testRequestResponseSuccess($response, $expectations): void
    {
        $xml = file_get_contents(__DIR__ . '/fixtures/' . $response);
        $response = $this->driver->decode('getLinguisticRequest', new SoapResponse($xml));
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
        return $this->getFixture('getLinguisticRequestResponse.yaml', '/Request');
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        // Since we don't have exact example of the error, let's use example from createLinguisticRequestResponse.
        $xml = file_get_contents(__DIR__.'/fixtures/createLinguisticRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('getLinguisticRequest', new SoapResponse($xml));
    }
}
