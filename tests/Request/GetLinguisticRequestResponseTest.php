<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test GetLinguisticRequestResponse service.
 */
final class GetLinguisticRequestResponseTest extends BaseRequestTest
{
    /**
     * Tests GetLinguisticRequestResponse xml into object conversion.
     *
     * @dataProvider dataProviderGetLinguisticRequestResponse
     */
    public function testGetLinguisticRequestResponse($response, $expectations): void
    {
        $object = $this->serializer->deserialize($response, 'OpenEuropa\EPoetry\Request\Type\GetLinguisticRequestResponse', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $object]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderGetLinguisticRequestResponse(): array
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
