<?php

declare(strict_types = 1);

namespace OpenEuropa\EPoetry\Tests\Request;

use Soap\Engine\HttpBinding\SoapResponse;

/**
 * Test ResubmitRequestResponse service.
 */
final class ResubmitRequestResponseTest extends BaseRequestTest
{
    /**
     * Tests resubmitRequestResponse xml into object conversion.
     *
     * @dataProvider dataProviderResubmitRequestResponse
     */
    public function testModifyLinguisticRequestResponse($response, $expectations): void
    {
        $object = $this->serializer->deserialize($response, 'OpenEuropa\EPoetry\Request\Type\ResubmitRequestResponse', 'xml');
        $this->assertExpressionLanguageExpressions($expectations['assertions'], ['response' => $object]);
    }

    /**
     * Data provider.
     *
     * @return array
     *   A set of dump data for testing.
     */
    public function dataProviderResubmitRequestResponse(): array
    {
        return $this->getFixture('resubmitRequestResponse.yaml', '/Request');
    }

    /**
     * Tests the error response.
     */
    public function testRequestResponseError(): void
    {
        $xml = file_get_contents(__DIR__.'/fixtures/resubmitRequestResponseError.xml');
        $this->expectException(\SoapFault::class);
        $this->expectExceptionMessage('Error 1: Incorrect on behalf DG!');
        $this->driver->decode('resubmitRequest', new SoapResponse($xml));
    }
}
