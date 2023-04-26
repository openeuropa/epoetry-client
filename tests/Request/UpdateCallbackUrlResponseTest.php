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
     * Tests updateCallbackUrlResponse xml into object conversion.
     *
     * @dataProvider dataProviderUpdateCallbackUrlResponse
     */
    public function testUpdateCallbackUrlResponse($response, $expectations): void
    {
        $object = $this->serializer->deserialize($response, 'OpenEuropa\EPoetry\Request\Type\UpdateCallbackUrlResponse', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $object]);
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
